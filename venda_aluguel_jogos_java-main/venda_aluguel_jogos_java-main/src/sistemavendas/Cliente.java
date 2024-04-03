/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package sistemavendas;

import java.io.Serializable;

/**
 *
 * @author Aninh
 */
public class Cliente extends Pessoa implements Serializable{

    public Cliente(int idade, String nome, String telefone, String cpf) {
        super(idade, nome, telefone, cpf);
    }
    
}
