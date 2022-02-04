package dylanbricar.pae.model;

import java.util.Set;

import javax.persistence.Entity;
import javax.persistence.EnumType;
import javax.persistence.Enumerated;
import javax.persistence.GeneratedValue;
import javax.persistence.GenerationType;
import javax.persistence.Id;
import javax.persistence.ManyToMany;
import javax.persistence.SequenceGenerator;
import javax.validation.constraints.NotNull;
import javax.validation.constraints.Size;

import com.fasterxml.jackson.annotation.JsonIgnoreProperties;

import javax.persistence.FetchType;

import lombok.AllArgsConstructor;
import lombok.Getter;
import lombok.NoArgsConstructor;
import lombok.Setter;

@AllArgsConstructor
@NoArgsConstructor
@Entity
@Getter
@Setter
public class Student {
    @Id
    @GeneratedValue(generator = "my_gen", strategy = GenerationType.SEQUENCE)
    @SequenceGenerator(name = "my_gen", sequenceName = "my_seq", allocationSize = 50)
    private long matricule;

    @NotNull
    @Size(min = 2, max = 50, message = "Doit faire entre 2 et 50 caractères")
    private String name;

    @Enumerated(EnumType.ORDINAL)
    @NotNull(message = "Ne doit pas être vide")
    private Genre genre;

    @Enumerated(EnumType.ORDINAL)
    @NotNull(message = "Ne doit pas être vide")
    private Section section;

    @JsonIgnoreProperties("linkedStudents")
    @ManyToMany(mappedBy="linkedStudents", fetch=FetchType.LAZY)
    Set<Course> likedCourses;

    @Override
    public String toString() {
        return "Student [genre=" + genre + ", matricule=" + matricule + ", name=" + name + ", section=" + section + "]";
    }

    @Override
    public int hashCode() {
        final int prime = 31;
        int result = 1;
        result = prime * result + ((genre == null) ? 0 : genre.hashCode());
        result = prime * result + (int) (matricule ^ (matricule >>> 32));
        result = prime * result + ((name == null) ? 0 : name.hashCode());
        result = prime * result + ((section == null) ? 0 : section.hashCode());
        return result;
    }

    @Override
    public boolean equals(Object obj) {
        if (this == obj)
            return true;
        if (obj == null)
            return false;
        if (getClass() != obj.getClass())
            return false;
        Student other = (Student) obj;
        if (genre != other.genre)
            return false;
        if (matricule != other.matricule)
            return false;
        if (name == null) {
            if (other.name != null)
                return false;
        } else if (!name.equals(other.name))
            return false;
        if (section != other.section)
            return false;
        return true;
    }


    
}
