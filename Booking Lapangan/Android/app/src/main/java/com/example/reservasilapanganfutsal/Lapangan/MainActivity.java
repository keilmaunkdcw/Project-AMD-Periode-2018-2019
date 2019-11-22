
package com.example.reservasilapanganfutsal.Lapangan;

import android.os.Handler;
import android.support.v4.widget.SwipeRefreshLayout;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.support.v7.widget.LinearLayoutManager;
import android.support.v7.widget.RecyclerView;
import android.view.Window;
import android.view.WindowManager;
import android.widget.Toast;

import com.example.reservasilapanganfutsal.Model.Value;
import com.example.reservasilapanganfutsal.R;
import com.example.reservasilapanganfutsal.api.RegiterAPI;

import java.util.List;

import retrofit2.Call;
import retrofit2.Callback;
import retrofit2.Response;
import retrofit2.Retrofit;
import retrofit2.converter.gson.GsonConverterFactory;

public class MainActivity extends AppCompatActivity {
    private static final String URL = "http://192.168.43.124/futsalapps/";
    private Listlapangan listLapangan;
    private RecyclerView recyclerView;
    // private SearchView searchView;
    private SwipeRefreshLayout pullToRefresh;
    //  private Toolbar toolbar;


    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);

        //mengatur background transparan
        Window w = getWindow();
        w.setFlags(WindowManager.LayoutParams.FLAG_LAYOUT_NO_LIMITS, WindowManager.LayoutParams.FLAG_LAYOUT_NO_LIMITS);

        recyclerView = (RecyclerView) findViewById(R.id.recyclerView);
        pullToRefresh = (SwipeRefreshLayout) findViewById(R.id.pulltorefresh);
        pullToRefresh.setOnRefreshListener(new SwipeRefreshLayout.OnRefreshListener() {
            @Override
            public void onRefresh() {
                refreshContent();
            }
        });
        Lapangan();

    }
    private void refreshContent(){
        new Handler().postDelayed(new Runnable() {
            @Override
            public void run() {
                Lapangan();
                pullToRefresh.setRefreshing(false);
            }
        },5000);
    }

        public void Lapangan(){
        Retrofit retrofit = new Retrofit.Builder()
                .baseUrl(URL)
                .addConverterFactory(GsonConverterFactory.create())
                .build();
        RegiterAPI api = retrofit.create(RegiterAPI.class);
        Call<Value> call = api.lapangan();
        call.enqueue(new Callback<Value>() {
            @Override
            public void onResponse(Call<Value> call, Response<Value> response) {
                String value = response.body().getValue();
                if (response.isSuccessful()) {
                    List<ItemLapangan> itemLapanganList = response.body().getLapangan();
                    if (value.equals("1")){
                        listLapangan = new Listlapangan(MainActivity.this,itemLapanganList);
                        RecyclerView.LayoutManager layoutManager = new LinearLayoutManager(MainActivity.this);
                        recyclerView.setLayoutManager(layoutManager);
                        recyclerView.setAdapter(listLapangan);
                    }else {
                        // kalau tidak true
                        Toast.makeText(MainActivity.this, "Tidak ada Artworknya", Toast.LENGTH_SHORT).show();
                    }
                }
            }

            @Override
            public void onFailure(Call<Value> call, Throwable t) {
                Toast.makeText(MainActivity.this, "Error\n"+t.toString(), Toast.LENGTH_LONG).show();
            }
        });

    }
}
