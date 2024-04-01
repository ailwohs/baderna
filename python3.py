################################################SIMULADO PARA A PROVA############################################################################

'''1 Entrada e Saída - Cerâmica

Elabore um algoritmo, onde o usuário informará o comprimento e a largura de um ambiente em metros e o comprimento e a largura em centímetros 
de um tipo de cerâmica a ser usado para revesti-lo. Você informar quantas unidades de carâmica serão necessárias para revestir todo o cômodo. 
(Considere que apenas o chão do comodo será revestido com as cerâmicas.)'''


'''
comprimento_ambiente_metros = float(input("Informe o comprimento do ambiente em metros:\t "))
largura_ambiente_metros = float(input("Informe a largura do ambiente em metros:\t "))

comprimento_ceramica_cm = float(input("Informe o comprimento da cerâmica em centímetros: "))
largura_ceramica_cm = float(input("Informe a largura da cerâmica em centímetros: "))

comprimento_ceramica_metros = comprimento_ceramica_cm / 100
largura_ceramica_metros = largura_ceramica_cm / 100

area_ambiente_metros_quadrados = comprimento_ambiente_metros * largura_ambiente_metros
area_ceramica_metros_quadrados = comprimento_ceramica_metros * largura_ceramica_metros


numero_ceramicas_necessarias = area_ambiente_metros_quadrados / area_ceramica_metros_quadrados

print("Serão necessárias:", numero_ceramicas_necessarias, " cerâmicas para revestir o chão")

'''

'''2 Decisão - 
Calculo Salário
Elabore um algoritmo que receba como entrada o preço da hora trabalhada, a quantidade de horas e calcule o quanto o funcionário tem a receber. 
Você deve atentar para o fato que passando de 40h o funcionário passa a receber o valor de hora extra, que é a hora normal acrescido de 50%.'''


'''
preço_hora_trabalha=int(input("Preço pela hora trabalhada: \t"))
horas_trabalhadas=int(input("Digite a quantidade de horas trabalhadas: \t"))

valores= preço_hora_trabalha * horas_trabalhadas
hora_extra = preço_hora_trabalha * horas_trabalhadas / 50 * 100

if (horas_trabalhadas <= 40):
    print("O valor rececebido é:", valores)
elif (horas_trabalhadas > 40):
    print("O valor a receber é:", hora_extra)
else:
    print("Os valores digitados estão inválidos")


#print("Você irá receber: ", valores)

#print("Você irá receber: ", hora_extra)


'''


'''3 FOR - Alturas e media
Elabore um algoritmo, onde o usuário informa a quantidade de pessoas presentes na turma. E depois ele lerá a altura de cada uma delas 
e ao final mostrará a média de todas as alturas informadas. (Utilize a estrutura FOR para responder a questão).'''

'''
pessoas_presentes_na_turma=int(input("Informe a quantidade de pessoas presentes na turma: \t"))

for i in range (pessoas_presentes_na_turma):
    altura_das_pessoas=float(input("Digite a altura das pessoas presentes na turma: \t "))

media_das_pessoas= altura_das_pessoas + altura_das_pessoas / i 

print("A média da altura de todas as pessoas presentes na sala é:", media_das_pessoas)

'''


# Calcula o número de cerâmicas necessárias
'''4 FOR - Chuvas
Elabore um algoritmo onde o usuário irá informar o índice de chuvas de dos meses do primeiro semestre de 2020 e depois o índice de 
chuvas dos meses do primeiro semestre de 2021. O índice varia entre 0 e 1, e ao final o código deverá exibir a média de cada semestre, 
e o mês mais chuvoso e mais seco de todo esse período (Utilize a estrutura FOR para responder esta questão).'''


'''for i in range (0,6):
    indice_chuvas_primeiro_semestre_2020=float(input("Digita o índice de chuvas do primeiro semestre de 2020: \t"))
for i in range (6):  
    indice_chuvas_primeiro_semestre_2021=float(input("Digita o índice de chuvas do primeiro semestre de 2021: \t"))
'''

#for i in range (0,6):
#    indice_chuvas_primeiro_semestre_2020=float(input("Digita o índice de chuvas do primeiro semestre de 2020: \t"))
#for i in range (6):  
#    indice_chuvas_primeiro_semestre_2021=float(input("Digita o índice de chuvas do primeiro semestre de 2021: \t"))

#soma_chuvas_2020 = 0
#soma_chuvas_2021 = 0



'''4. FOR - Chuvas
* Elabore um algoritmo onde o usuário irá informar o índice de chuvas de dos meses do primeiro semestre de 2020 e depois o 
índice de chuvas dos meses do primeiro semestre de 2021. O índice varia entre 0 e 1, e ao final o código deverá exibir a média 
de cada semestre, e o mês mais chuvoso e mais seco de todo esse período (Utilize a estrutura FOR para responder esta questão).
* Funcionamento
* Entrada: [0.5; 0.3; 0.5; 0.9; 0.8; 0.7] [0.1; 0.3; 0.8; 1; 0.7; 0.5] 
| Saída: Média do primeiro semestre - 0.61 Média do Segundo Semestre: 0.56 
O mês chuvoso foi de índice: 1 O mês mais seco teve o índice 0.1'''
 
#chuva_2020 = 0 
#chuva_2021 = 0

maior=-1
menor=2
soma=0

for chuva_2020 in range (6):
    indice1=float(input("Digite o indice de chuvas do primeiro semestre de 2020:\t"))
    if indice1 > maior:
        maior = indice1
    if indice1 < menor:
        menor = indice1
    soma = soma + indice1
for chuva_2021 in range (6):
    indice2=float(input("Digite o indice de chuvas do primeiro semestre de 2021:\t"))
    if indice2 > maior:
         maior = indice2
    if indice2 < menor: 
         menor = indice2
    soma = soma + indice2
    
print("O maior número é:", maior)
print("O menor número é:", menor)
print("A média é:", soma)



'''Escalada

Elabore um algoritmo que irá receber uma série de valores representando a quantidade de minutos que cada alpinista 
do grupo 2564 de escala levou até chegar ao cume do Everest. O grupo tem 7 alpinistas, e ao final do programa 
você deve exibir qual o menor tempo de escalada que um alpinista do grupo levou, qual o maior tempo e a média do 
tempo de subida do grupo. (UTILIZE ESTRUTURA DE REPETIÇÃO, FOR OU WHILE PARA RESPONDER ESTA QUESTÃO)
Passeio JTUR



Construa um algoritmo para trazer informações a empresa JTUR sobre as pessoas que estão frequentando seus passeios. 
Todas os passeios da empresa precisam ser feitos em grupo e cada grupo deve ter no mínimo 5 pessoas, no dia são feitos 
no máximo 6 passeios. No seu programa o usuário irá informar quantos adultos e quantas crianças tem em cada grupo, uma vez 
que ele informe os dados do primeiro grupo, o programa deve perguntar se ele deseja continuar inserindo dados, isto deve ser
feito até o usuário escolher não informar mais dados. Ao final o programa deve exibir, a quantidade de pessoas que fizeram o
passeio naquele dia, a porcentagem de crianças, a porcentagem de adultos e média de pessoas por grupo. 
(UTILIZE ESTRUTURA(s) DE REPETIÇÃO, FOR e/ou WHILE PARA RESPONDER ESTA QUESTÃO)
Vinhos envelhecendo






Construa um algoritmo que irá ler a quantidade de meses que as garrafas de vinho que estão armazenadas na
Cave 5 de uma determinada adega já tiveram de envelhecimento. Cada Cave armazena 10 garrafas. 
Ao final você deve informar, quantos vinhos estão prontos para o envase (aqueles que ficaram mais de 2 anos envelhecendo), 
quantos vinhos estão a 5 meses envelhecendo e qual a média de tempo que estes vinhos têm de envelhecimento. 
(UTILIZE ESTRUTURA DE REPETIÇÃO, FOR OU WHILE PARA RESPONDER ESTA QUESTÃO)'''




    

    



