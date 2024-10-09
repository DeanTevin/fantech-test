# Logic Test
you can run both of the .py file in python compiler. 

use this without hassle https://www.programiz.com/python-programming/online-compiler/

## TEST NO 1
> i'm using the dictionary to count how many duplicates in the the array input. If the count is more than 1, we divide them by 2. The result then rounded (using math package) and incremented in the loop.

```python

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

```

## TEST NO 2
> I first needs to specify the character that are included to be the validators in special_character variables. Then split the sentence into array using split() function. for each words in array is iterated and validated against the special_characters using any() function. if it doesn't have special_character then increment the count variable by 1, otherwise do nothing.

```python
import math

# sentence = "Kemarin shopia per[gi ke mall."
# sentence = "Saat meng*ecat tembok, Agung dib_antu oleh Raihan."
# sentence = "Berapa u(mur minimal[ untuk !mengurus ktp?"
sentence = "Masing-masing anak mendap(atkan uang jajan ya=ng be&rbeda."

special_characters = " !\"#$%&'()*+/:;<=>@[\]^_`{|}~"

words = sentence.split()

count = 0
for x in words:
    if any(c in special_characters for c in x):
        pass #do nothing
    else:
        count += 1

print (count)

```
> 


