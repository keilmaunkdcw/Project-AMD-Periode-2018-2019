package com.example.reservasilapanganfutsal;

import android.os.Handler;
import android.support.v4.view.MenuItemCompat;
import android.support.v4.widget.SwipeRefreshLayout;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.support.v7.widget.LinearLayoutManager;
import android.support.v7.widget.RecyclerView;
import android.view.MenuItem;
import android.view.View;
import android.widget.SearchView;
import android.widget.Toast;

import com.example.reservasilapanganfutsal.Model.Memesan;
import com.example.reservasilapanganfutsal.Model.Value;
import com.example.reservasilapanganfutsal.api.RegiterAPI;

import java.util.List;

import retrofit2.Call;
import retrofit2.Callback;
import retrofit2.Response;
import retrofit2.Retrofit;
import retrofit2.converter.gson.GsonConverterFactory;

public class Pemesanan extends AppCompatActivity implements SearchView.OnQueryTextListener{

    public static final String URL = "http://192.168.43.164/futsalapps/";
    // private ArrayList<Memesan> data;
    private Datamodel mDataModel;
    private RecyclerView recyclerView;
    // private SearchView searchView;
    private SwipeRefreshLayout pullToRefresh;
    //  private Toolbar toolbar;
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_detail);
        //  toolbar = findViewById(R.id.toolbar);
//        setSupportActionBar(toolbar);
        getSupportActionBar().setDisplayHomeAsUpEnabled(true);
        getSupportActionBar().setTitle("Daftar Pemesanan");
        recyclerView = (RecyclerView) findViewById(R.id.recyclerView);
        pullToRefresh = (SwipeRefreshLayout) findViewById(R.id.pulltorefresh);
        pullToRefresh.setOnRefreshListener(new SwipeRefreshLayout.OnRefreshListener() {
            @Override
            public void onRefresh() {
                refreshContent();
            }
        });
        LoadPemesan();

    }
    private void refreshContent(){
        new Handler().postDelayed(new Runnable() {
            @Override
            public void run() {
                LoadPemesan();
                pullToRefresh.setRefreshing(false);
            }
        },5000);
    }


    @Override
    public boolean onOptionsItemSelected(MenuItem item) {
        int id = item.getItemId();
        switch (item.getItemId()) {
            case android.R.id.home:
                finish();
                break;
        }
        return super.onOptionsItemSelected(item);
    }

    private void LoadPemesan() {
        Retrofit retrofit = new Retrofit.Builder()
                .baseUrl(URL)
                .addConverterFactory(GsonConverterFactory.create())
                .build();
        RegiterAPI api = retrofit.create(RegiterAPI.class);
        Call<Value> call = api.view();
        call.enqueue(new Callback<Value>() {
            @Override
            public void onResponse(Call<Value> call, Response<Value> response) {
                String value = response.body().getValue();
                if (response.isSuccessful()) {
                    List<Memesan> memesanList = response.body().getResult();
                    if (value.equals("1")){
                        mDataModel = new Datamodel(Pemesanan.this,memesanList);
                        RecyclerView.LayoutManager layoutManager = new LinearLayoutManager(Pemesanan.this);
                        recyclerView.setLayoutManager(layoutManager);
                        recyclerView.setAdapter(mDataModel);
                    }
                }
            }

            @Override
            public void onFailure(Call<Value> call, Throwable t) {
                Toast.makeText(Pemesanan.this, "Error\n"+t.toString(), Toast.LENGTH_LONG).show();
            }
        });
    }

    @Override
    public boolean onCreateOptionsMenu(android.view.Menu menu) {
        getMenuInflater().inflate(R.menu.menu_search, menu);
        final MenuItem item = menu.findItem(R.id.action_search);
        final SearchView searchView = (SearchView) MenuItemCompat.getActionView(item);
        searchView.setQueryHint("Cari NIK");
        searchView.setIconified(false);
        searchView.setOnQueryTextListener(this);
        return true;
    }

    @Override
    public boolean onQueryTextSubmit(String query) {
        return false;
    }

    @Override
    public boolean onQueryTextChange(String newText) {
        recyclerView.setVisibility(View.GONE);
        Retrofit retrofit = new Retrofit.Builder()
                .baseUrl(URL)
                .addConverterFactory(GsonConverterFactory.create())
                .build();
        RegiterAPI api = retrofit.create(RegiterAPI.class);
        Call<Value> call = api.search(newText);
        call.enqueue(new Callback<Value>() {
            @Override
            public void onResponse(Call<Value> call, Response<Value> response) {
                String value = response.body().getValue();
                recyclerView.setVisibility(View.VISIBLE);
                if (response.isSuccessful()) {
                    List<Memesan> memesanList = response.body().getResult();
                    if (value.equals("1")){
                        mDataModel = new Datamodel(Pemesanan.this,memesanList);
                        RecyclerView.LayoutManager layoutManager = new LinearLayoutManager(Pemesanan.this);
                        recyclerView.setLayoutManager(layoutManager);
                        recyclerView.setAdapter(mDataModel);
                    }
                }

            }

            @Override
            public void onFailure(Call<Value> call, Throwable t) {

            }
        });
        return true;
    }
}



