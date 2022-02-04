package webg5.g54027.repository;

import java.util.List;

import org.springframework.data.jpa.repository.Query;
import org.springframework.data.repository.CrudRepository;

import webg5.g54027.model.Track;

public interface TrackDB extends CrudRepository<Track, Integer> {
    @Query("SELECT t.id, t.title, t.stream, a.name FROM Track t JOIN t.artist a WHERE t.stream > :greaterThan")
    public List<Object[]> findAllMostListenedThan(int greaterThan);
}
