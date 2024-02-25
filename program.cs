using System.Linq;

string mensagemDeBoasVindas = "Bem Vindo(a) a Biblioteca de Filmes";

Dictionary<string, List<int>> filmesRegistrados = new Dictionary<string, List<int>>();
filmesRegistrados.Add("Coraline", new List<int> { 10, 8, 6 });
filmesRegistrados.Add("Jogos Vorazes", new List<int>());

void ExibirLogo()
{
    Console.WriteLine(@"
█▄▄ █ █▄▄ █░░ █ █▀█ ▀█▀ █▀▀ █▀▀ ▄▀█   █▀▄ █▀▀   █▀▀ █ █░░ █▀▄▀█ █▀▀ █▀
█▄█ █ █▄█ █▄▄ █ █▄█ ░█░ ██▄ █▄▄ █▀█   █▄▀ ██▄   █▀░ █ █▄▄ █░▀░█ ██▄ ▄█");
    Console.WriteLine("\n" + mensagemDeBoasVindas);
}

void ExibirOpcoesDoMenu()
{
    Console.WriteLine("\nDigite 1 para registrar uma filme");
    Console.WriteLine("Digite 2 para mostrar todos os filmes registrados");
    Console.WriteLine("Digite 3 para avaliar um filme");
    Console.WriteLine("Digite 4 para exibir a média da nota de um filme");

    Console.Write("\nDigite a sua opção: ");
    string opcaoEscolhida = Console.ReadLine()!;
    int opcaoEscolhidaNumerica = int.Parse(opcaoEscolhida);

    switch (opcaoEscolhidaNumerica)
    {
        case 1:
            RegistrarFilme();
            break;
        case 2:
            MostrarFilmesRegistrados();
            break;
        case 3:
            AvaliarUmFilme();
            break;
        case 4:
            ExibirMedia();
            break;
        default:
            Console.WriteLine("Até Mais :)");
            break;
    }
}
void RegistrarFilme()
{
    Console.Clear();
    ExibirTituloDaOpcao("Registro de Filme");
    Console.Write("Digite o nome do filme que deseja registrar: ");
    string nomeDoFilme = Console.ReadLine()!;
    filmesRegistrados.Add(nomeDoFilme, new List<int>());
    Console.WriteLine("O filme " + nomeDoFilme + " foi registrado com sucesso!");
    Thread.Sleep(2000);
    Console.Clear();
    ExibirLogo();
    ExibirOpcoesDoMenu();
}

void MostrarFilmesRegistrados()
{
    Console.Clear();
    ExibirTituloDaOpcao("Filmes Registrados");

    foreach (string filme in filmesRegistrados.Keys)
    {
        Console.WriteLine($"Filme: {filme}");
    }

    Console.WriteLine("\nDigite qualquer tecla para voltar ao menu principal");
    Console.ReadKey();
    Console.Clear();
    ExibirLogo();
    ExibirOpcoesDoMenu();
};

void ExibirTituloDaOpcao(string titulo)
{
    int quantidadeDeLetras = titulo.Length;
    string asteriscos = string.Empty.PadLeft(quantidadeDeLetras, '*');
    Console.WriteLine(asteriscos);
    Console.WriteLine(titulo);
    Console.WriteLine(asteriscos + "\n");
}

void AvaliarUmFilme()
{
    Console.Clear();
    ExibirTituloDaOpcao("Avaliar Filme");
    Console.Write("Digite o nome do filme que deseja avaliar: ");
    string nomeDoFilme = Console.ReadLine();

    if (filmesRegistrados.ContainsKey(nomeDoFilme))
    {
        Console.Write($"Qual nota o filme {nomeDoFilme} merece: ");
        int nota = int.Parse(Console.ReadLine()!);
        filmesRegistrados[nomeDoFilme].Add(nota);
        Console.WriteLine($"\nA nota {nota} foi registrada com sucesso para o filme {nomeDoFilme}!");
        Thread.Sleep(4000);
        Console.Clear();
        ExibirLogo();
        ExibirOpcoesDoMenu();
    }
    else
    {
        Console.WriteLine($"\nO filme {nomeDoFilme} não foi encontrado!");
        Console.WriteLine("Digite qualquer tecla para voltar ao menu principal");
        Console.ReadKey();
        Console.Clear();
        ExibirLogo();
        ExibirOpcoesDoMenu();
    }
}

void ExibirMedia()
{
    Console.Clear();
    ExibirTituloDaOpcao("Média de Filmes");
    Console.Write("\nDigite o nome do filme que você deseja exibir a média: ");
    string nomeDoFilme = Console.ReadLine(); // até que a tecla Enter seja pressionada

    if (filmesRegistrados.ContainsKey(nomeDoFilme))
    {

        List<int> notasDoFilme = filmesRegistrados[nomeDoFilme];
        Console.WriteLine($"\nA média do filme {nomeDoFilme} é {notasDoFilme.Average().ToString("F1")}.");
        Console.WriteLine("Digite qualquer tecla para voltar ao menu principal");
        Console.ReadKey(); //não espera que o usuário pressione enter
        Console.Clear();
        ExibirLogo();
        ExibirOpcoesDoMenu();
    }
    else
    {
        Console.WriteLine($"\nO filme {nomeDoFilme} não foi encontrado!");
        Console.WriteLine("Pressione qualquer tecla para voltar ao menu");
        Console.ReadKey();
        Console.Clear();
        ExibirLogo();
        ExibirOpcoesDoMenu();
    }
}

ExibirLogo();
ExibirOpcoesDoMenu();
