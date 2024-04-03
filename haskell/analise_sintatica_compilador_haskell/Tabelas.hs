module Tabelas where
import Text.Parsec
import Text.Parsec.Expr
import qualified Text.Parsec.Token as T
import Text.Parsec.Language
import DataTypes
import Lex


--tabelas
tabela =[[prefix "-" Neg],
    [binario "*" (:*:) AssocLeft,
     binario "/" (:/:) AssocLeft],
    [binario "+" (:+:) AssocLeft,
     binario "-" (:-:) AssocLeft]]

tabelaL = [[prefix "!" Not],
    [binario "&&" (:&:) AssocLeft,
     binario "||" (:|:) AssocLeft]]

tipo = do {(reserved "int" >> return TInt) 
          <|> (reserved "double" >> return TDouble) 
          <|> (reserved "string" >> return TString) 
          <?> "type"}
