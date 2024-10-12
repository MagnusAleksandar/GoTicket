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

public class Evento {
    private String pulep;
    private String nombre;
    private Date fecha;
    private String hora;  // Utilizamos String para simplificar el formato de tiempo (HH:mm:ss)
    private int aforo;
    private int nitProveedor;

    // Constructor
    public Evento(String pulep, String nombre, Date fecha, String hora, int aforo, int nitProveedor) {
        this.pulep = pulep;
        this.nombre = nombre;
        this.fecha = fecha;
        this.hora = hora;
        this.aforo = aforo;
        this.nitProveedor = nitProveedor;
    }

    // Getters y Setters
    public String getPulep() {
        return pulep;
    }

    public void setPulep(String pulep) {
        this.pulep = pulep;
    }

    public String getNombre() {
        return nombre;
    }

    public void setNombre(String nombre) {
        this.nombre = nombre;
    }

    public Date getFecha() {
        return fecha;
    }

    public void setFecha(Date fecha) {
        this.fecha = fecha;
    }

    public String getHora() {
        return hora;
    }

    public void setHora(String hora) {
        this.hora = hora;
    }

    public int getAforo() {
        return aforo;
    }

    public void setAforo(int aforo) {
        this.aforo = aforo;
    }

    public int getNitProveedor() {
        return nitProveedor;
    }

    public void setNitProveedor(int nitProveedor) {
        this.nitProveedor = nitProveedor;
    }
}
