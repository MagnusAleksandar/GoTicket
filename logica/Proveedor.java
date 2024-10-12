/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package logica;

/**
 *
 * @author Daniela Huertas
 */
public class Proveedor extends Persona {
    private int nit;

    // Constructor
    public Proveedor(int nit, String nombre, String email, String telefono) {
        super(0, nombre, email, telefono); // El id en Persona no es necesario, por eso se pasa 0.
        this.nit = nit;
    }

    // Getter para nit
    public int getNit() {
        return nit;
    }

    // Setter para nit
    public void setNit(int nit) {
        this.nit = nit;
    }

    // Otros métodos pueden ser heredados de Persona
}

