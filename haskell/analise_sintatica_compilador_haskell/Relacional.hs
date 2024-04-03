module Relacional where

import Text.Parsec
import Text.Parsec.Expr
import qualified Text.Parsec.Token as T
import Text.Parsec.Language
import DataTypes
import Lex
--import Logico



opr = do {(operator "==" >> return (:==:))
      <|> (operator ">=" >> return (:>=:))
      <|> (operator "<=" >> return (:<=:))
      <|> (operator ">" >> return (:>:))
      <|> (operator "<" >> return (:<:))
      <|> (operator "/=" >> return (:/=:))
      <?> "operador relacional"}

list element = sepBy element comando