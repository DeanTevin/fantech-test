# sentence = "Kemarin shopia per[gi ke mall."
# sentence = "Saat meng*ecat tembok, Agung dib_antu oleh Raihan."
# sentence = "Berapa u(mur minimal[ untuk !mengurus ktp?"
sentence = "Masing-masing anak mendap(atkan uang jajan ya=ng be&rbeda."

special_characters = " !\"#$%&'()*+/:;<=>@[\]^_`{|}~"

words = sentence.split()

count = 0
for x in words:
    if any(c in special_characters for c in x):
        pass
    else:
        count += 1

print (count)