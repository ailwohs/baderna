# Inicializa as variáveis para contagem
consultas_unimed = 0
consultas_redevida = 0
consultas_internow = 0
consultas_particular = 0
valor_total_particular = 0

# Solicita ao usuário o número de consultas realizadas no dia
numero_consultas = int(input("Informe o número de consultas realizadas no dia: "))

# Loop para registrar cada consulta
for _ in range(numero_consultas):
    tipo_consulta = input("Informe o tipo de consulta (convênio/particular): ").lower()
    
    if tipo_consulta == "convênio":
        convenio = input("Informe o convênio (Unimed/RedeVida/Internow): ").capitalize()
        if convenio == "Unimed":
            consultas_unimed += 1
        elif convenio == "Redevida":
            consultas_redevida += 1
        elif convenio == "Internow":
            consultas_internow += 1
        else:
            print("Convênio não reconhecido. Consulta não registrada.")
    elif tipo_consulta == "particular":
        valor_consulta = float(input("Informe o valor pago pela consulta: "))
        consultas_particular += 1
        valor_total_particular += valor_consulta
    else:
        print("Tipo de consulta não reconhecido. Consulta não registrada.")

# Exibe os resultados
print("\nResumo das Consultas:")
print(f"Consultas Unimed: {consultas_unimed}")
print(f"Consultas RedeVida: {consultas_redevida}")
print(f"Consultas Internow: {consultas_internow}")
print(f"Consultas Particulares: {consultas_particular}")
print(f"Valor Total Pago por Consultas Particulares: R$ {valor_total_particular:.2f}")

