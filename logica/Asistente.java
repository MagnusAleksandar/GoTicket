/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package logica;

/**
 *
 * @author Daniela Huertas
 */
public class Asistente extends Persona {
    private int idAsistente;

    // Constructor
    public Asistente(int idAsistente, String nombre, String email, String telefono) {
        super(idAsistente, nombre, email, telefono);
        this.idAsistente = idAsistente;
    }

    // Getter para idAsistente
    public int getIdAsistente() {
        return idAsistente;
    }

    // Setter para idAsistente
    public void setIdAsistente(int idAsistente) {
        this.idAsistente = idAsistente;
    }

    // Otros métodos pueden ser heredados de Persona
}

