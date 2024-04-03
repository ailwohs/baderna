module Lex where

import Text.Parsec
import Text.Parsec.Expr
import qualified Text.Parsec.Token as T
import Text.Parsec.Language
import DataTypes

definicao = emptyDef
  {
    T.commentStart    = "{-",
    T.commentEnd      = "-}",
    T.commentLine     = "--",
    T.reservedOpNames = ["+", "-", "*", "/", "==", "/=", "<", "<=", ">", ">=", "&&", "||", "!", "="],
    T.reservedNames   = ["int", "double", "string", "void", "if", "else", "while", "read", "print", "return", "main"]
  }


lexico = T.makeTokenParser definicao
numero = T.naturalOrFloat lexico
simbolo = T.symbol lexico
parenteses = T.parens lexico
operator = T.reservedOp lexico
literal = T.stringLiteral lexico
identifier = T.identifier lexico
comando = T.comma lexico
reserved = T.reserved lexico
braces = T.braces lexico
pontovirgula = T.semi lexico

prefix name fun = Prefix (do {operator name; return fun})
binario name fun = Infix  (do {operator name; return fun})
