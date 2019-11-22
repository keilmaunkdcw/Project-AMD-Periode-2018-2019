package com.example.poliklinik.Admin;

import android.content.Intent;
import android.os.Bundle;
import android.support.annotation.NonNull;
import android.support.design.widget.BottomNavigationView;
import android.support.v4.app.Fragment;
import android.support.v7.app.AppCompatActivity;
import android.view.MenuItem;
import android.view.View;
import android.widget.Button;
import android.widget.TextView;

import com.example.poliklinik.MainActivity;
import com.example.poliklinik.R;
import com.example.poliklinik.Sessionlogin;
import com.example.poliklinik.User.Halamanutama_User;

public class Halamanutama_Admin extends AppCompatActivity {

    public Sessionlogin sessionlogin;
    Button btn_logout;

    private BottomNavigationView.OnNavigationItemSelectedListener mOnNavigationItemSelectedListener
            = new BottomNavigationView.OnNavigationItemSelectedListener() {

        @Override
        public boolean onNavigationItemSelected(@NonNull MenuItem item) {
            switch (item.getItemId()) {
                case R.id.navigation_home:
                    LoadFragemnt(new Menu_home());
                    return true;
                case R.id.navigation_dashboard:
                    LoadFragemnt(new Menu_userdokter());
                    return true;
                case R.id.navigation_notifications:
                    LoadFragemnt(new Menu_verifikasi());
                    return true;
            }
            return false;
        }
    };

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_halaman_utama_admin);

        btn_logout = (Button) findViewById(R.id.btn_logout);
        sessionlogin = new Sessionlogin(getApplicationContext());
        sessionlogin.checkLogin();

        BottomNavigationView navigation = (BottomNavigationView) findViewById(R.id.navigation);


        btn_logout.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                sessionlogin.saveSPBoolean(sessionlogin.IS_LOGIN, false);
                startActivity(new Intent(Halamanutama_Admin.this, MainActivity.class)
                        .addFlags(Intent.FLAG_ACTIVITY_CLEAR_TOP | Intent.FLAG_ACTIVITY_NEW_TASK));
                finish();
            }
        });

        navigation.setOnNavigationItemSelectedListener(mOnNavigationItemSelectedListener);


    }

    private void LoadFragemnt (Fragment fragment){
        getSupportFragmentManager().beginTransaction()
                .replace(R.id.view_content, fragment)
                .commit();
    }



}
