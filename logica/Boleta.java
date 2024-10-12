/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package logica;

/**
 *
 * @author Daniela Huertas
 */
public class Boleta {
    private int idBoleta;
    private int idAsistente;
    private int idFactura;
    private String pulep;
    private int precio;

    // Constructor
    public Boleta(int idBoleta, int idAsistente, int idFactura, String pulep, int precio) {
        this.idBoleta = idBoleta;
        this.idAsistente = idAsistente;
        this.idFactura = idFactura;
        this.pulep = pulep;
        this.precio = precio;
    }

    // Getters y Setters
    public int getIdBoleta() {
        return idBoleta;
    }

    public void setIdBoleta(int idBoleta) {
        this.idBoleta = idBoleta;
    }

    public int getIdAsistente() {
        return idAsistente;
    }

    public void setIdAsistente(int idAsistente) {
        this.idAsistente = idAsistente;
    }

    public int getIdFactura() {
        return idFactura;
    }

    public void setIdFactura(int idFactura) {
        this.idFactura = idFactura;
    }

    public String getPulep() {
        return pulep;
    }

    public void setPulep(String pulep) {
        this.pulep = pulep;
    }

    public int getPrecio() {
        return precio;
    }

    public void setPrecio(int precio) {
        this.precio = precio;
    }
}

