
import java.io.BufferedReader;
import java.io.BufferedWriter;
import java.io.IOException;
import java.io.InputStreamReader;
import java.io.OutputStream;
import java.io.OutputStreamWriter;
import java.io.UnsupportedEncodingException;
import java.net.HttpURLConnection;
import java.net.MalformedURLException;
import java.net.ProtocolException;
import java.net.URL;
import java.net.URLEncoder;
import java.util.HashMap;
import java.util.Map;

public class MakeHttpQuery {

    private String _req_url;
    private String login;
    private String password;

    public void doGet() throws MalformedURLException, IOException {

        final String ANSI_RED = "\u001B[31m";
        final String ANSI_RESET = "\u001B[0m";
        final String ANSI_GREEN = "\u001B[32m";
        //make http request
        URL req_ul = new URL(_req_url + "?user_login=" + login + "&user_pass=" + password);
        HttpURLConnection connection = (HttpURLConnection) req_ul.openConnection();
        connection.setRequestMethod("GET");

        //make http response
        String page_title = check_title(connection);

        boolean is_ok = login_password_ok(page_title);
        if (is_ok) {
            System.out.println(ANSI_GREEN + " login : " + login + " password : " + password + "  succeed !  " + ANSI_RESET);
        } else {
            System.out.println(ANSI_RED + " login : " + login + " password : " + password + "  Failed !  " + ANSI_RESET);
        }

    }

    public void doPost() throws MalformedURLException, ProtocolException, IOException {

        final String ANSI_RED = "\u001B[31m";
        final String ANSI_RESET = "\u001B[0m";
        final String ANSI_GREEN = "\u001B[32m";
        //make http request
        URL req_ul = new URL(_req_url);
        HttpURLConnection connection = (HttpURLConnection) req_ul.openConnection();
        connection.setRequestMethod("POST");
        connection.setDoOutput(true);
        HashMap<String, String> postDataParams = new HashMap<String, String>();
        postDataParams.put("user_login", login);
        postDataParams.put("user_pass", password);
        OutputStream os = connection.getOutputStream();
        BufferedWriter writer = new BufferedWriter(
                new OutputStreamWriter(os, "UTF-8"));
        writer.write(getPostDataString(postDataParams));

        writer.flush();
        writer.close();
        os.close();

        //make http response
        String page_title = check_title(connection);

        boolean is_ok = login_password_ok(page_title);
        if (is_ok) {
            System.out.println(ANSI_GREEN + " login : " + login + " password : " + password + "  succeed !  " + ANSI_RESET);
        } else {
            System.out.println(ANSI_RED + " login : " + login + " password : " + password + "  Failed !  " + ANSI_RESET);
        }

    }

    private String getPostDataString(HashMap<String, String> params) throws UnsupportedEncodingException {
        StringBuilder result = new StringBuilder();
        boolean first = true;
        for (Map.Entry<String, String> entry : params.entrySet()) {
            if (first) {
                first = false;
            } else {
                result.append("&");
            }

            result.append(URLEncoder.encode(entry.getKey(), "UTF-8"));
            result.append("=");
            result.append(URLEncoder.encode(entry.getValue(), "UTF-8"));
        }

        return result.toString();
    }

    /**
     * @param _req_url the _req_url to set
     */
    public void setReq_url(String _req_url) {
        this.setURL(_req_url);
    }

    /**
     * @param _req_url the _req_url to set
     */
    public void setURL(String _req_url) {
        this._req_url = _req_url;
    }

    /**
     * @param login the login to set
     */
    public void setLogin(String login) {
        this.login = login;
    }

    /**
     * @param password the password to set
     */
    public void setPassword(String password) {
        this.password = password;
    }

    public String check_title(HttpURLConnection connection) throws IOException {
        BufferedReader in = new BufferedReader(
                new InputStreamReader(
                        connection.getInputStream()));
        String inputLine, page_title = null;
        int occ = 0;
        while ((inputLine = in.readLine()) != null && occ < 3) {

            occ++;

            page_title = inputLine;

        }
        in.close();
        return page_title;
    }

    public boolean login_password_ok(String line) {
        line = line.replace(" ", "");

        if (line.equals("<title>sucess</title>")) {
            return true;
        } else {
            return false;
        }
    }

}
