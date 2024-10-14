/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package logica;

/**
 *
 * @author Daniela Huertas
 */
import java.util.Date;

public class Factura {
    private int idFactura;
    private int idBoleta;
    private int idCliente;
    private String pulep;
    private Date fechaGeneracion;
    private String horaGeneracion; // Utilizamos String para simplificar el formato de tiempo (HH:mm:ss)
    private double montoTotal;

    // Constructor
    public Factura(int idFactura, int idBoleta, int idCliente, String pulep, Date fechaGeneracion, String horaGeneracion, double montoTotal) {
        this.idFactura = idFactura;
        this.idBoleta = idBoleta;
        this.idCliente = idCliente;
        this.pulep = pulep;
        this.fechaGeneracion = fechaGeneracion;
        this.horaGeneracion = horaGeneracion;
        this.montoTotal = montoTotal;
    }

    // Getters y Setters
    public int getIdFactura() {
        return idFactura;
    }

    public void setIdFactura(int idFactura) {
        this.idFactura = idFactura;
    }

    public int getIdBoleta() {
        return idBoleta;
    }

    public void setIdBoleta(int idBoleta) {
        this.idBoleta = idBoleta;
    }

    public int getIdCliente() {
        return idCliente;
    }

    public void setIdCliente(int idCliente) {
        this.idCliente = idCliente;
    }

    public String getPulep() {
        return pulep;
    }

    public void setPulep(String pulep) {
        this.pulep = pulep;
    }

    public Date getFechaGeneracion() {
        return fechaGeneracion;
    }

    public void setFechaGeneracion(Date fechaGeneracion) {
        this.fechaGeneracion = fechaGeneracion;
    }

    public String getHoraGeneracion() {
        return horaGeneracion;
    }

    public void setHoraGeneracion(String horaGeneracion) {
        this.horaGeneracion = horaGeneracion;
    }

    public double getMontoTotal() {
        return montoTotal;
    }

    public void setMontoTotal(double montoTotal) {
        this.montoTotal = montoTotal;
    }
}
