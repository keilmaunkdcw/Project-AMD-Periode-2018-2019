package com.example.poliklinik.Admin;

import android.os.Bundle;
import android.support.v4.app.Fragment;
import android.support.v7.widget.LinearLayoutManager;
import android.support.v7.widget.RecyclerView;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.Toast;

import com.example.poliklinik.Api.Client;
import com.example.poliklinik.Api.InterfaceDataDokter;
import com.example.poliklinik.Api.InterfaceDataPasien;
import com.example.poliklinik.Model.DataPasienResponse;
import com.example.poliklinik.Model.PasienListItem;
import com.example.poliklinik.R;

import java.util.List;

import retrofit2.Call;
import retrofit2.Callback;
import retrofit2.Response;


public class Menu_verifikasi extends Fragment {
    private RecyclerView rv_data;
    private Pasienmodel mPasienmodel;
    private InterfaceDataPasien mInterfaceDataPasien;

    @Override
    public View onCreateView(LayoutInflater inflater, ViewGroup container,
                             Bundle savedInstanceState) {
        View view = inflater.inflate(R.layout.fragment_menu_verifikasi,container, false);
        rv_data = (RecyclerView) view.findViewById(R.id.rv_data);
        mInterfaceDataPasien = (InterfaceDataPasien) Client.getClient().create(InterfaceDataPasien.class);
        mInterfaceDataPasien.showAllPasien().enqueue(new Callback<DataPasienResponse>() {
            @Override
            public void onResponse(Call<DataPasienResponse> call, Response<DataPasienResponse> response) {
               DataPasienResponse dataPasienResponse = response.body();
               if(!dataPasienResponse.isError()){
                   if(dataPasienResponse.getMessage().equals("Data Tersedia")){
                       List<PasienListItem> pasienListItems = response.body().getData();
                       mPasienmodel = new Pasienmodel(getContext(),pasienListItems);
                       RecyclerView.LayoutManager layoutManager = new LinearLayoutManager(getContext());
                       rv_data.setLayoutManager(layoutManager);
                       rv_data.setAdapter(mPasienmodel);
                   }else{
                       Toast.makeText(getActivity(), dataPasienResponse.getMessage(), Toast.LENGTH_SHORT).show();
                   }
               }else{
                   Toast.makeText(getActivity(), dataPasienResponse.getMessage(), Toast.LENGTH_SHORT).show();
               }
            }

            @Override
            public void onFailure(Call<DataPasienResponse> call, Throwable t) {

            }
        });
        return view;
    }


}
