import math

# Input = [10,20,20,10,10,30,50,10,20]
# Input =  [6,5,2,3,5,2,2,1,1,5,1,3,3,3,5]
Input =  [1,1,3,1,2,1,3,3,3,3]


my_dict = {i:Input.count(i) for i in Input}
result = 0
for key in my_dict:
     if (my_dict[key] > 1):
        result = result + math.floor(my_dict[key] / 2)

print(result)