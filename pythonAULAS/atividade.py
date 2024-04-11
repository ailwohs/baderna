'''1 - Faça um programa que defina o seguinte array: [100,101,102,104]. Imprima o vetor na tela bem como a quantidade de elementos. Faça a inserção de mais um elemento qualquer ao final do vetor. Novamente imprima na tela o vetor e também a quantidade de caracteres. Faça depois a inserção do elemento 'A' no início do vetor e imprima ele na tela junto com o seu novo tamanho.'''

'''x=[100,101,102,104]

#len(): https://www.w3schools.com/python/ref_func_len.asp
print(x, len(x))

#append(): https://www.w3schools.com/python/ref_list_append.asp
x.append('B') #final do vetor
print(x)
print(len(x)) #função len contagem

#insert(): https://www.w3schools.com/python/ref_list_insert.asp
x.insert(0,"A") # inicio
print(x, len(x))'''

'''2 - Faça um programa que solicite ao usuário que digite um texto qualquer. Converta o texto digitado em um array. Depois, conte quantas vogais foram digitadas.'''

'''#lower(): https://www.w3schools.com/python/ref_string_lower.asp
texto = input("Favor digite um texto").lower()
#texto = texto.lower();
arrayDestino = []
vogais = ['a', 'e', 'i', 'o', 'u']
cont = 0

for i in range(0,len(texto)):  
  #arrayDestino.insert(i,texto[i])
  arrayDestino.append(texto[i])
  if(texto[i]=='a' or texto[i]=='e' or texto[i]=='i' or texto[i]=='o' or texto[i]=='u'):
    cont+=1
  print(i, texto[i], cont)
  #for j in range(0,len(vogais)):
    #if(texto[i]==vogais[j]):
      #cont+=1

print(arrayDestino, cont)'''

'''3 - Faça um programa que defina o seguinte array: [4,5,6,8,7]. Depois faça a subtração de cada elemento do array por 1, resultando o array [3,4,5,7,6]. Imprima ambos na tela.'''

'''array =  [4,5,6,8,7]
for i in range(0,len(array)):
  print(array[i])
  array[i]=array[i]-1

print(array)'''


'''4 - Faça um programa que inicie um array 'X' vazio. Inclua neste array vazio 8 elementos numéricos quaisquer (utilize um laço de repetição). Crie um novo array 'Y' que seja cópia independente do array 'X'. Altere os três primeiros elementos do array 'X' para os valores 0,100,1000. Imprima posteriormente os dois vetores na tela.'''

'''#https://www.w3schools.com/python/ref_random_randint.asp
import random

x =  []
for i in range(0,8):
  x.append(random.randint(0, 10))

#copy(): https://www.programiz.com/python-programming/methods/list/copy
y = x.copy()
#y = x[:]
x[0]=0
x[1]=100
x[2]=1000

print(x,y)'''


'''5- A festa do Joselito se aproxima e como muitas pessoas querem participar, ele teve a brilhante ideia de criar um programa para gerenciar a entrada de pessoas e evitar 
os penetras. Você chamado para criar este programa que funcionará de seguinte forma primeiro será informado quantas pessoas estão na lista de convidados, depois o programa 
será alimentado com nome e sobrenome de cada pessoa. Depois o programa apresentará um menu: 0 – Encerrar o programa; 1 – Consultar nome. Quando o usuário digitar 1, o programa 
solicitará um nome e exibirá uma mensagem informando se esse nome está na lista ou não. Este processo se repetirá até que o usuário encerre o programa.

Melhorias:

quando um nome for informado verificar se tem espaço, caso não tenha solicite a pessoa informe nome e sobrenome da pessoa
armazene o número de pessoas que compareceram na festa e quando o usuário encerrar o programa informe a quantidade de pessoas que estiveram presentes na festa'''


qtdPessoas=int(input("Quantas pessoas estaram na lista de convidados \n"))
lista=[]
for i in range (0, qtdPessoas):
    nome = input("Informe o nome de pessoas convidadas \n")
    lista.append(nome)
    
print(lista)



'''6-Dado um conjunto de valores que representam o peso dos bois de uma boiada, construa um algoritmo que identifique quantos deles
pesam mais que 10 arrobas (cada arroba pesa 14.7kg), quantos estão prontos para o abate (peso maior que 100kg), qual o peso do boy mais pesado e menos pesado.'''

'''boiada = [125, 199, 98, 224, 100, 77 , 320, 204, 111]
qtdAbata =0 
qtdArroba =0
for i in  boiada:
    if i > 147:
        qtdArroba +=1
    if i > 100:
        qtdAbata +=1
        
print(min(boiada), "É o boi menos pesado" , max(boiada), "é o boi mais pesado", qtdArroba, "Pesam mais que 10 arrobas", qtdAbata, "Estão prontos para o abate")'''



'''7-Elabore um algoritmo que irá receber uma série de valores representando a quantidade de minutos que cada alpinista do grupo 2564 
de escala levou até chegar ao cume do Everest. O grupo tem 7 alpinistas, e ao final do programa você deve exibir qual o menor tempo de escalada que um alpinista do grupo levou,
qual o maior tempo e a média do tempo de subida do grupo. (UTILIZE ESTRUTURA DE REPETIÇÃO, FOR OU WHILE PARA RESPONDER ESTA QUESTÃO) 
- Construir resposta usando vetor e sem usar vetor'''


'''tempo=[]
total=0

for i in range (0,7):
    #guarda os valores
    tempoAlpinista = int(input("Informe o tempo do alpinista \n"))
    total += tempoAlpinista
    #append armazena e ascrecenta elementos
    tempo.append(tempoAlpinista)
    #acumula tempo pra media 
print(tempo)
print(min(tempo), "foi o menor tempo")
print(max(tempo), "foi o maior tempo")
print(total/7, "foi a média de tempo")'''

