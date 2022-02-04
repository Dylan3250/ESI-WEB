package webg5.vscode;

import org.slf4j.Logger;
import org.slf4j.LoggerFactory;

import lombok.extern.slf4j.Slf4j;

/**
 * Hello world!
 *
 */
@Slf4j
public class App {

    // private static final Logger logger = LoggerFactory.getLogger("webg5.App");
 
    public static void main(String[] args) {
        System.out.println("Hello World!");
        log.info("Info à donner");
        log.error("Erreur à donner");
    }

    @Override
    public String toString() {
        return super.toString();
    }
}
