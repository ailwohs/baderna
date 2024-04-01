## Projeto de Estufa com Arduino

Neste projeto de automação de estufa baseado em IoT, foram desenvolvidos vários códigos para controlar e monitorar a estufa. Abaixo estão as funções gerais de cada um desses códigos:

### `Estufa.ino`

O código `Estufa.ino` tem a função de controlar e monitorar uma estufa. Suas principais funções incluem:

- Configuração de hardware, incluindo sensores e módulos GSM.
- Conexão à Internet para monitoramento remoto.
- Leitura de sensores para medir umidade do solo, temperatura ambiente, umidade, luminosidade e raios UV.
- Envio dos dados coletados para um servidor MQTT em formato JSON para monitoramento remoto.
- O loop principal executa a leitura de sensores e o envio de dados a cada intervalo predefinido.

### `JsonTeste.ino`

Este arquivo demonstra como trabalhar com dados JSON. Sua função principal é:

- Leitura de uma mensagem JSON de exemplo e extração de informações específicas, como método e parâmetros.

### `Rele.ino`

O código `Rele.ino` é responsável pelo controle de módulos de relé para dispositivos elétricos. Suas funções principais incluem:

- Configuração dos pinos conectados aos módulos de relé como saídas.
- No loop principal, liga e desliga os módulos de relé em uma sequência específica para controlar dispositivos elétricos.

### `SubscribeMQTT.ino`

O código `SubscribeMQTT.ino` lida com a comunicação MQTT para assinatura de tópicos e recebimento de mensagens. Suas principais funções são:

- Estabelecimento de conexão com um servidor MQTT por meio de um módulo GSM.
- Assinatura de tópicos MQTT, incluindo tópicos relacionados a procedimentos remotos (RPC).
- No loop principal, verifica a conexão com o servidor MQTT e lida com mensagens recebidas, incluindo chamadas de procedimento remoto.

Cada um desses códigos desempenha um papel fundamental na automação e monitoramento da estufa baseada em IoT, desde a coleta de dados dos sensores até o controle de dispositivos elétricos e a comunicação com um servidor MQTT para monitoramento remoto.
