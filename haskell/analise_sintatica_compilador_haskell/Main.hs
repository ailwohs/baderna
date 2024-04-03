-- Alunos: Ana Athayde, Lucas Thomas
-- Trabalho de Compiladores Parte 1


import Text.Parsec
import Text.Parsec.Expr
import qualified Text.Parsec.Token as T
import Text.Parsec.Language
import DataTypes
import Comandos
import Programa

-- main
-- Função para analisar a entrada
parseProgram :: String -> Either ParseError Programa
parseProgram = runParser program () "Expressions"

-- Função principal
main :: IO ()
main = do
    input <- readFile "teste1.j--"
    case parseProgram input of
        Left error -> print error
        Right ast -> print ast



