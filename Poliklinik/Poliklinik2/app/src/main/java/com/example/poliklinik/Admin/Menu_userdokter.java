package com.example.poliklinik.Admin;

import android.content.Intent;
import android.os.Bundle;
import android.support.v4.app.Fragment;
import android.support.v7.widget.CardView;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;

import com.example.poliklinik.R;


public class Menu_userdokter extends Fragment {

    CardView cv_datadokter, cv_dataantripasien;

    @Override
    public View onCreateView(LayoutInflater inflater, ViewGroup container,
                             Bundle savedInstanceState) {
        View view = inflater.inflate(R.layout.fragment_menu_userdokter,container, false);
        cv_datadokter = (CardView) view.findViewById(R.id.cv_datadokter);
        cv_dataantripasien = (CardView) view.findViewById(R.id.cv_dataantripasien);

        cv_datadokter.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                pindahActivity(Data_dokter.class);
            }
        });

        cv_dataantripasien.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                pindahActivity(Data_Pasien.class);
            }
        });
        return view;
    }

    private void pindahActivity(Class activity){
        Intent intent =  new Intent(getActivity(), activity);
        startActivity(intent);
    }

}
