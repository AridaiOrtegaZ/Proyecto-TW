package mx.uv.t4is.ToDoList;

import org.springframework.data.repository.CrudRepository;

public interface Itareas extends CrudRepository<Tarea, Integer>{

    Iterable<Tarea> findByFecha(String fecha);
}
