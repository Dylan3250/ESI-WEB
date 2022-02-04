package dylanbricar.pae.test;

import static org.springframework.test.web.servlet.request.MockMvcRequestBuilders.get;
import static org.springframework.test.web.servlet.result.MockMvcResultMatchers.status;

import java.util.ArrayList;

import org.hamcrest.Matchers;

import static org.springframework.test.web.servlet.result.MockMvcResultMatchers.jsonPath;

import org.junit.jupiter.api.Test;
import org.mockito.Mockito;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.boot.test.autoconfigure.web.servlet.WebMvcTest;
import org.springframework.boot.test.mock.mockito.MockBean;
import org.springframework.test.web.servlet.MockMvc;
import org.springframework.web.bind.annotation.RestController;

import antlr.collections.List;
import dylanbricar.pae.business.Pae;
import dylanbricar.pae.model.Course;
import dylanbricar.pae.web.RestCourse;
import static org.mockito.BDDMockito.given;

@WebMvcTest(RestCourse.class)
public class CoursesRestTest {

    @Autowired
    private MockMvc mvc;

    @MockBean
    private Pae paeService;

    @Test
    void courses() throws Exception {
        Course course = new Course("INT1", "INTRODUCTION", 100, null);
        ArrayList<Course> c = new ArrayList<>();
        c.add(course);

        given(paeService.getCourses()).willReturn(c);
        mvc.perform(get("/api/courses"))
                .andExpect(status().isOk())
                .andExpect(jsonPath("$[0].id", Matchers.is("INT1")))
                .andReturn();
    }
}
