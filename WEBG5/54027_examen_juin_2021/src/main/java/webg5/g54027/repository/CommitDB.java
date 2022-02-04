package webg5.g54027.repository;

import org.springframework.data.repository.CrudRepository;

import webg5.g54027.model.Commit;

public interface CommitDB extends CrudRepository<Commit, Integer> {

}
