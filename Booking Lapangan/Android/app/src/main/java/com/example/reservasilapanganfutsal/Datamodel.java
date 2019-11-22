package com.example.reservasilapanganfutsal;

import android.annotation.SuppressLint;
import android.content.Context;
import android.support.annotation.NonNull;
import android.support.v7.widget.CardView;
import android.support.v7.widget.RecyclerView;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.TextView;

import com.example.reservasilapanganfutsal.Model.Memesan;

import java.util.ArrayList;
import java.util.List;

public class Datamodel extends RecyclerView.Adapter<Datamodel.DataViewAdapter>{

    private Context context;
    private List<Memesan> memesan;

    public Datamodel(Context context,List<Memesan>memesan){

        this.context=context;
        this.memesan = memesan;
    }


    @Override
    public DataViewAdapter onCreateViewHolder( ViewGroup viewGroup, int i) {
        View view = LayoutInflater.from(viewGroup.getContext()).inflate(R.layout.content_list,viewGroup,false);
        DataViewAdapter dataViewAdapter = new DataViewAdapter(view);
        return dataViewAdapter;
    }

    @Override
    public void onBindViewHolder(DataViewAdapter dataViewAdapter,final int position) {
        dataViewAdapter.kode_transaksi.setText( memesan.get(position).getKodeunik());
        dataViewAdapter.nama_pemesan.setText(memesan.get(position).getNama());
        dataViewAdapter.nik.setText(memesan.get(position).getNik());
        dataViewAdapter.tgl_sewa.setText(memesan.get(position).getTgl_sewa());
        dataViewAdapter.jam_mulai.setText(memesan.get(position).getJammulai());
        dataViewAdapter.lapangan.setText(memesan.get(position).getLapangan());
        dataViewAdapter.status_pembayaran.setText(memesan.get(position).getStatus());
    }


    @Override
    //Menghitung Ukuran/Jumlah Data Yang Akan Ditampilkan Pada RecyclerView
    public int getItemCount() {
        return memesan.size();
    }


    private ArrayList<Memesan> data = new ArrayList<>();
    public void swapData(ArrayList<Memesan> data) {
        this.data.addAll(data);
        notifyDataSetChanged();
    }

    //ViewHolder Digunakan Untuk Menyimpan Referensi Dari View-View
    public class DataViewAdapter extends RecyclerView.ViewHolder {
        private TextView kode_transaksi,nama_pemesan,nik,tgl_sewa,jam_mulai,lapangan,status_pembayaran;
        public DataViewAdapter(@NonNull View itemView) {
            super(itemView);
            //Menginisialisasi View-View untuk kita gunakan pada RecyclerView
             kode_transaksi = (TextView) itemView.findViewById(R.id.tv_kode_transaksi);
             nama_pemesan = (TextView) itemView.findViewById(R.id.tv_nama_pemesan);
             nik = (TextView) itemView.findViewById(R.id.tv_nik);
             tgl_sewa = (TextView) itemView.findViewById(R.id.tv_tanggal_sewa);
             jam_mulai = (TextView) itemView.findViewById(R.id.tv_jammulai);
             lapangan = (TextView) itemView.findViewById(R.id.tv_lapangan);
             status_pembayaran = (TextView) itemView.findViewById(R.id.tv_status_pembayaran);
        }
    }
}

