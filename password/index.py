import pandas as pd
import random as rd


randst =[]
a = 0
df = pd.read_excel (r'C:\Users\1styrGroupA\Desktop\pandas\2021Codes.xlsx')

def rand():
    n= rd.randint(12345678,87654321)
    return n


while len(randst)!= 75 :
    a = rand()
    if a not in randst and a not in randst:
        randst.append(a)
    else:
        a = rand()

print(len(randst))



    

pd.DataFrame(randst).to_excel('2022Codes.xlsx', header=False, index=False)

