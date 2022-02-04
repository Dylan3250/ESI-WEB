package webg5.g54027.repository;

import org.springframework.data.repository.CrudRepository;

import webg5.g54027.model.Task;

public interface TaskDB extends CrudRepository<Task, Integer> {

}
