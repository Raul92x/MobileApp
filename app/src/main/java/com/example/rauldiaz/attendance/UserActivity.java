package com.example.rauldiaz.attendance;

import android.content.Intent;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.TextView;

public class UserActivity extends AppCompatActivity {

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_user);

        final EditText etUsername = (EditText) findViewById(R.id.etUsername);
        final TextView welcomeMessage = (TextView) findViewById(R.id.tvWelcomeMsg);

        final Button bLogout = (Button) findViewById(R.id.bLogout);


        Intent intent = getIntent();
        String name = intent.getStringExtra("name");
        String username = intent.getStringExtra("username");

        String message = name + " welcome to your user area";
        welcomeMessage.setText(message);
        etUsername.setText(username);



        bLogout.setOnClickListener(new View.OnClickListener() {

            public void onClick(View v) {
                Intent loginscreen = new Intent(UserActivity.this,LoginActivity.class);
                loginscreen.addFlags(Intent.FLAG_ACTIVITY_CLEAR_TOP);
                startActivity(loginscreen);
                finish();
            }
        });






    }
}
