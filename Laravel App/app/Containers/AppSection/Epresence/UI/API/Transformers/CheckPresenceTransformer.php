<?php

namespace App\Containers\AppSection\Epresence\UI\API\Transformers;

use App\Containers\AppSection\Epresence\Models\Epresence;
use App\Ship\Parents\Transformers\Transformer as ParentTransformer;

class CheckPresenceTransformer extends ParentTransformer
{
    protected array $defaultIncludes = [

    ];

    protected array $availableIncludes = [

    ];

    public static function CustomTransformer($epresence): array
    {
        $groupedData = [];

        foreach ($epresence as $item) {
            $date = date('Y-m-d', strtotime($item->waktu));
            
            $key = array_search($date, array_column($groupedData, 'tanggal'));

            if ($key === false) {
                $groupedData[] = [
                    'id_user' => $item->id_users,
                    'nama_user' => $item->user->name,
                    'tanggal' => $date,
                    'waktu_masuk' => ($item->type === 'in') ? date('H:i:s', strtotime($item->waktu)) : null,
                    'waktu_pulang' => ($item->type === 'out') ? date('H:i:s', strtotime($item->waktu)) : null,
                    'status_masuk' => ($item->is_approved && $item->type === 'in') ? 'APPROVE' : 'REJECT',
                    'status_pulang' => ($item->is_approved && $item->type === 'out') ? 'APPROVE' : 'REJECT',
                ];
            } else {
                if ($item->type === 'in') {
                    $groupedData[$key]['waktu_masuk'] = date('H:i:s', strtotime($item->waktu));
                    $groupedData[$key]['status_masuk'] = $item->is_approved ? 'APPROVE' : 'REJECT';
                } elseif ($item->type === 'out') {
                    $groupedData[$key]['waktu_pulang'] = date('H:i:s', strtotime($item->waktu));
                    $groupedData[$key]['status_pulang'] = $item->is_approved ? 'APPROVE' : 'REJECT';
                }
            }
        }

        $response = $groupedData;

        return $response;
    }
}
