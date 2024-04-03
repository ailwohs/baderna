module Comandos where

import Text.Parsec
import Text.Parsec.Expr
import qualified Text.Parsec.Token as T
import Text.Parsec.Language
import DataTypes
import Lex
import Relacional
import Tabelas
import Parametro
import Logico




--blocos
blocoPrincipal = do 
                b <- braces bloco'
                return (concat (fst b), snd b)

bloco' = do 
            d <- many declaration
            c <- many comando'
            return (d, c)

bloco = braces (many comando')

-- comandos
comandoif = try (do
            reserved "if"
            l <- parenteses logic
            b <- bloco
            reserved "else"
            If l b <$> bloco
            ) 
            <|> do
                reserved "if"
                l <- parenteses logic
                b <- bloco
                return (If l b [])

comandowhile = do 
                reserved "while"
                l <- parenteses logic
                While l <$> bloco

atribuicao = do 
             i <- identifier
             operator "="
             e <- expr
             pontovirgula
             return (Atrib i e)

comandoread = do
              reserved "read"
              i <- parenteses identifier
              pontovirgula
              return (Leitura i)

comandoprint = do
               reserved "print"
               e <- parenteses expr
               pontovirgula
               return (Print e)

comandoreturn = try (do
                reserved "return"
                e <- expr
                pontovirgula
                return (Ret (Just e))
                ) 
                <|> do 
                    reserved "return"
                    pontovirgula
                    return (Ret Nothing)

comandocall = do
              i <- identifier
              e <- parenteses (list expr)
              pontovirgula
              return (Proc i e)

callatrib = try atribuicao 
            <|> comandocall

comando' = do 
            comandoif 
          <|> comandowhile 
          <|> callatrib 
          <|> comandoread 
          <|> comandoprint 
          <|> comandoreturn 
          <?> "command"
