/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package logica;

/**
 *
 * @author Daniela Huertas
 */
public class Cliente extends Persona {
    private int idCliente;

    // Constructor
    public Cliente(int idCliente, String nombre, String email, String telefono) {
        super(idCliente, nombre, email, telefono);
        this.idCliente = idCliente;
    }

    // Getter para idCliente
    public int getIdCliente() {
        return idCliente;
    }

    // Setter para idCliente
    public void setIdCliente(int idCliente) {
        this.idCliente = idCliente;
    }

    // Otros métodos pueden ser heredados de Persona
}

