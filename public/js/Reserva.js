class Reserva
{
    constructor (idReserva, nombre, apellidos, personas, fecha, identificador, telefono, email, asignado, impartido)
    {
        this._idReserva = idReserva;
        this._nombre = nombre;
        this._apellidos = apellidos;
        this._personas = personas;
        this._fecha = fecha;
        this._identificador = identificador;
        this._telefono = telefono;
        this._email = email;
        this._asignado = asignado;
        this._impartido = impartido;
    }
    
    get idReserva()
    {
        return this._idReserva;
    }
    
    get nombre()
    {
        return this._nombre;
    }
    get apellidos()
    {
        return this._apellidos;
    }
    
    get personas()
    {
        return this._personas;
    }
    
    get fecha()
    {
        return this._fecha;
    }
    
    get identificador()
    {
        return this._identificador;
    }
    
    get telefono()
    {
        return this._telefono;
    }
    
    get email()
    {
        return this._email;
    }
    
    get asignado()
    {
        return this._asignado;
    }
    
    get impartido()
    {
        return this._impartido;
    }
}