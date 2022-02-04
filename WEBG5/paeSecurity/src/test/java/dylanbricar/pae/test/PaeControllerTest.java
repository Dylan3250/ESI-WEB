package dylanbricar.pae.test;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.boot.test.autoconfigure.web.servlet.AutoConfigureMockMvc;
import org.springframework.boot.test.context.SpringBootTest;
import org.springframework.test.web.servlet.MockMvc;
import org.hamcrest.Matchers;
import org.junit.jupiter.api.Test;

import static org.springframework.test.web.servlet.request.MockMvcRequestBuilders.*;
import static org.springframework.test.web.servlet.result.MockMvcResultMatchers.*;

@SpringBootTest
@AutoConfigureMockMvc
public class PaeControllerTest {

    @Autowired
    private MockMvc mockMvc; // Permet de simuler le navigateur

    @Test
    public void testHome() throws Exception {
        mockMvc.perform(get("/courses")) // L'url à tester
                .andExpect(status().isOk()) // La page est retournée
                .andExpect(view().name("courses")) // Générée à partir du template welcome
                                                   // Elle contient le texte attendu
                .andExpect(content().string(Matchers.containsString("Liste des cours")));
    }
}