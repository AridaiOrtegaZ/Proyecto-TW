package mx.uv.t4is.ToDoList;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.ws.server.endpoint.annotation.Endpoint;
import org.springframework.ws.server.endpoint.annotation.PayloadRoot;
import org.springframework.ws.server.endpoint.annotation.RequestPayload;
import org.springframework.ws.server.endpoint.annotation.ResponsePayload;

import https.t4is_uv_mx.todolist.AgregarTareaRequest;
import https.t4is_uv_mx.todolist.AgregarTareaResponse;
import https.t4is_uv_mx.todolist.BuscarTareaRequest;
import https.t4is_uv_mx.todolist.BuscarTareaResponse;
import https.t4is_uv_mx.todolist.EliminarTareaRequest;
import https.t4is_uv_mx.todolist.EliminarTareaResponse;
import https.t4is_uv_mx.todolist.ModificarTareaRequest;
import https.t4is_uv_mx.todolist.ModificarTareaResponse;
import https.t4is_uv_mx.todolist.MostrarTareasResponse;
import https.t4is_uv_mx.todolist.TotalTareasResponse;

@Endpoint
public class ToDoListEndPoint {
    
    @Autowired
    Itareas itareas;

    /* Agregar Tarea */
    @PayloadRoot(localPart = "AgregarTareaRequest", namespace = "https://t4is.uv.mx/todolist")
    @ResponsePayload
    public AgregarTareaResponse agregarTarea(@RequestPayload AgregarTareaRequest peticion){
        AgregarTareaResponse respuesta = new AgregarTareaResponse();
        respuesta.setRespuesta("La tarea: "+peticion.getNombre()+", ha sido guardada");
        Tarea tarea = new Tarea();
        tarea.setNombre(peticion.getNombre());
        tarea.setDescripcion(peticion.getDescripcion());
        tarea.setPrioridad(peticion.getPrioridad());
        tarea.setTipo(peticion.getTipo());
        tarea.setFecha(peticion.getFecha());
        itareas.save(tarea);
        return respuesta;
    }

    /* Buscar Tarea por fecha */
    @PayloadRoot(localPart = "BuscarTareaRequest" ,namespace = "https://t4is.uv.mx/todolist")
    @ResponsePayload
    public BuscarTareaResponse buscarLibro(@RequestPayload BuscarTareaRequest peticion) { //El parámetro petición nos ayuda a recuperar valores ingresados en el wsdl
        BuscarTareaResponse respuesta = new BuscarTareaResponse();
        Iterable<Tarea> listaTareas = itareas.findByFecha(peticion.getFecha());
        for (Tarea tarea : listaTareas){
            BuscarTareaResponse.Tareas t = new BuscarTareaResponse.Tareas();
            t.setId(tarea.getId());
            t.setNombre(tarea.getNombre());
            t.setDescripcion(tarea.getDescripcion());
            t.setPrioridad(tarea.getPrioridad());
            t.setTipo(tarea.getTipo());
            t.setFecha(tarea.getFecha());
            respuesta.getTareas().add(t);
        }
        return respuesta;

    }

    /* MostrarTareasRequest */
    @PayloadRoot(localPart = "MostrarTareasRequest" ,namespace = "https://t4is.uv.mx/todolist")
    @ResponsePayload
    public MostrarTareasResponse MostrarTareas(){
        MostrarTareasResponse respuesta = new MostrarTareasResponse();
        Iterable<Tarea> lista = itareas.findAll();
        
        for (Tarea tarea : lista) {
            MostrarTareasResponse.Tarea t = new MostrarTareasResponse.Tarea();
            t.setNombre(tarea.getNombre());
            t.setId(tarea.getId());
            t.setDescripcion(tarea.getDescripcion());
            t.setPrioridad(tarea.getPrioridad());
            t.setTipo(tarea.getTipo());
            t.setFecha(tarea.getFecha());
            respuesta.getTarea().add(t);
        }
        return respuesta;
    }
    
    /*Modificar Tarea*/
    @PayloadRoot(localPart = "ModificarTareaRequest" ,namespace = "https://t4is.uv.mx/todolist")
    @ResponsePayload
    public ModificarTareaResponse modificarTarea(@RequestPayload ModificarTareaRequest peticion){
        ModificarTareaResponse respuesta = new ModificarTareaResponse(); 
        Tarea tarea = new Tarea();
        tarea.setId(peticion.getId());
        tarea.setNombre(peticion.getNombre());
        tarea.setDescripcion(peticion.getDescripcion());
        tarea.setPrioridad(peticion.getPrioridad());
        tarea.setTipo(peticion.getTipo());
        tarea.setFecha(peticion.getFecha());
        itareas.save(tarea);
        respuesta.setRespuesta("Tarea modificada");
        return respuesta;
    }

    /*Eliminar Tarea*/
    @PayloadRoot(localPart = "EliminarTareaRequest", namespace = "https://t4is.uv.mx/todolist")
    @ResponsePayload
    public EliminarTareaResponse eliminarTarea(@RequestPayload EliminarTareaRequest peticion){
        EliminarTareaResponse respuesta = new EliminarTareaResponse();
        itareas.deleteById(peticion.getId());
        respuesta.setRespuesta("Tarea eliminada");
        return respuesta;
    }

    /*Total Tareas*/
    @PayloadRoot(localPart = "TotalTareasRequest", namespace = "https://t4is.uv.mx/todolist")
    @ResponsePayload
    public TotalTareasResponse totalTareas(){
        TotalTareasResponse respuesta = new TotalTareasResponse();
        respuesta.setRespuesta("Tu total de tareas es: "+itareas.count());
        return respuesta;
    }
    
}
