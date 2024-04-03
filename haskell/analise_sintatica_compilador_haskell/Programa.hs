module Programa where

import Text.Parsec
import Text.Parsec.Expr
import qualified Text.Parsec.Token as T
import Text.Parsec.Language
import DataTypes
import Lex
import Relacional
import Tabelas
import Logico
import Comandos
import Parametro

program = do 
          f <- funcoes
          m <- blocoPrincipal
          return (Prog (fst f) (snd f) (fst m) (snd m))


--funcao
funcao = do
    tipo <- tipoRetorno
    id <- identifier
    p <- parenteses parametros
    bloco <- braces bloco'
    return (id :->: (p, tipo), (id, concat (fst bloco), snd bloco))

funcoes = do {f <- many funcao;
          return (unzip f)}

--tipo retorno
tipoRetorno = do
    tipo 
    <|> (reserved "void" >> return TVoid) 
    <?> "type"
