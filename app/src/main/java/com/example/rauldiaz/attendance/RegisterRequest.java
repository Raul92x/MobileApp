package com.example.rauldiaz.attendance;

import com.android.volley.Response;
import com.android.volley.toolbox.StringRequest;

import java.util.HashMap;
import java.util.Map;

/**
 * Created by Raul Diaz on 8/23/2016.
 */
public class RegisterRequest extends StringRequest{

    private static final String REGISTER_REQUEST_URL = "https://cse-raul92x.c9users.io/Register.php";
    private Map<String, String> params;

    public RegisterRequest(String name, String username, String password, Response.Listener<String> listener){
        super(Method.POST, REGISTER_REQUEST_URL, listener, null);
        params = new HashMap<>();
        params.put("name", name);
        params.put("username", username);
        params.put("password", password);
    }

    @Override
    public Map<String, String> getParams() {
        return params;
    }
}
