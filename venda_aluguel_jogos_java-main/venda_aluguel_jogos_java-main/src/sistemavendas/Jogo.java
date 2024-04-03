/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package sistemavendas;

/**
 *
 * @author Aninh
 */
public class Jogo implements Alugar_Comprar{
    private int id, quantidade, quantidade_disp;
    private String nome;

    public Jogo(int id, int quantidade, String nome) {
        this.id = id;
        this.quantidade = quantidade;
        this.quantidade_disp = quantidade;
        this.nome = nome;
    }

    public int getId() {
        return id;
    }

    public void setId(int id) {
        this.id = id;
    }

    public int getQuantidade() {
        return quantidade;
    }

    public void setQuantidade(int quantidade) {
        this.quantidade = quantidade;
    }

    public int getQuantidade_disp() {
        return quantidade_disp;
    }

    public void setQuantidade_disp(int quantidade_disp) {
        this.quantidade_disp = quantidade_disp;
    }

    public String getNome() {
        return nome;
    }

    public void setNome(String nome) {
        this.nome = nome;
    }  
    
    @Override
    public void alugar(int quantidade) {
      if(this.quantidade_disp<quantidade){
          System.out.println("Quantidade de itens indisponível!");
          System.out.println("Quantidade em estoque:"+quantidade_disp);
      }else{
          this.quantidade_disp-=quantidade;
      }
    }

    @Override
    public void devolver(int quantidade) {
        if(this.quantidade_disp<quantidade){
            System.out.println("Quantidade de itens indisponível!");
            System.out.println("Quantidade em estoque:"+quantidade_disp);
        }else{
            this.quantidade_disp+=quantidade;
        }
    }

    @Override
    public void comprar(int quantidade) {
        if(this.quantidade_disp<quantidade){
            System.out.println("Quantidade de itens indisponível!");
            System.out.println("Quantidade em estoque:"+quantidade_disp);
        }else{
            this.quantidade-=quantidade;
            this.quantidade_disp-=quantidade;
        }
    }
    
}
