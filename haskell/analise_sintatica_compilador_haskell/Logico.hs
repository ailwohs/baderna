module Logico where

import Text.Parsec
import Text.Parsec.Expr
import qualified Text.Parsec.Token as T
import Text.Parsec.Language
import DataTypes
import Lex
import Relacional
import Tabelas

exprL = do {parenteses logic 
        <|> Rel 
        <$> exprR}
logic = buildExpressionParser tabelaL exprL 
      <?> "expressao logica"

expr = buildExpressionParser tabela fator 
       <?> "expressao"

exprR = do {
    e <- expr;
    r <- opr; 
    r e <$> expr;}

fator = do parenteses expr
        <|> constant 
        <|> Lit <$> literal 
        <|> try (do
              i <- identifier;
              e <- parenteses (list expr)
              return (Chamada i e) 
            )
        <|> IdVar <$> identifier 
        <?> "expressao simples"

constant = do {c <- numero; case c of Left  n -> return (Const (CInt n)); Right n -> return (Const (CDouble n))}