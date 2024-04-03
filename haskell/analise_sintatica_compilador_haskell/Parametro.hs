module Parametro where


import Text.Parsec
import Text.Parsec.Expr
import qualified Text.Parsec.Token as T
import Text.Parsec.Language
import DataTypes
import Lex
import Relacional
import Tabelas

parametro = do
        t <- tipo
        i <- identifier
        return (i :#: t)

parametros = list parametro

declaration = do
        t <- tipo
        i <- list identifier
        pontovirgula
        return (map (:#: t) i)
