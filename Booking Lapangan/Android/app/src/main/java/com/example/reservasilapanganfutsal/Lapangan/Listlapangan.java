package com.example.reservasilapanganfutsal.Lapangan;

import android.content.Context;
import android.content.Intent;
import android.support.annotation.NonNull;
import android.support.v7.widget.CardView;
import android.support.v7.widget.RecyclerView;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.ImageView;
import android.widget.TextView;

import com.bumptech.glide.Glide;
import com.example.reservasilapanganfutsal.R;
import com.example.reservasilapanganfutsal.Pemesan;

import java.util.ArrayList;
import java.util.List;

public class Listlapangan extends RecyclerView.Adapter<Listlapangan.DataViewAdapter> {


    private Context context;
    private List<ItemLapangan> lpngn;

    public Listlapangan(Context context, List<ItemLapangan> lpngn) {
        this.context = context;
        this.lpngn = lpngn;
    }


    @Override
    public Listlapangan.DataViewAdapter onCreateViewHolder(ViewGroup viewGroup, int i) {
        LayoutInflater layoutInflater = LayoutInflater.from(viewGroup.getContext());
        View view = layoutInflater.inflate(R.layout.list_lapangan,viewGroup,false);
        return new DataViewAdapter(view);
    }

    @Override
    public void onBindViewHolder(DataViewAdapter dataViewAdapter, final int position) {
        dataViewAdapter.lapangan.setText(lpngn.get(position).getLapangan());
        dataViewAdapter.jenis_lapangan.setText(lpngn.get(position).getJenis_lapangan());
        dataViewAdapter.harga.setText(lpngn.get(position).getHarga());

        Glide.with(context)
                .load(lpngn.get(position).getGambar())
                .into(dataViewAdapter.background_img);

        dataViewAdapter.cv_list.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Intent intent = new Intent(v.getContext(),Pemesan.class);
                context.startActivity(intent);

            }
        });
    }


    @Override
    //Menghitung Ukuran/Jumlah Data Yang Akan Ditampilkan Pada RecyclerView
    public int getItemCount() {
        return lpngn.size();
    }

    //ViewHolder Digunakan Untuk Menyimpan Referensi Dari View-View
    public class DataViewAdapter extends RecyclerView.ViewHolder {
        ImageView background_img, iv_foto;
        TextView lapangan, jenis_lapangan, harga;
        CardView cv_list;
        public DataViewAdapter(@NonNull View itemView) {
            super(itemView);
            //Menginisialisasi View-View untuk kita gunakan pada RecyclerView
            background_img = itemView.findViewById(R.id.iv_foto);
            lapangan = itemView.findViewById(R.id.tv_lapangan);
            jenis_lapangan = itemView.findViewById(R.id.tv_jenis_lapangan);
            iv_foto = itemView.findViewById(R.id.iv_foto2);
            cv_list = itemView.findViewById(R.id.cv_content);
            harga = itemView.findViewById(R.id.tv_harga);

        }

    }

}


