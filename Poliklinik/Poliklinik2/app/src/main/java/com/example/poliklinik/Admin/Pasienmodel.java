package com.example.poliklinik.Admin;

import android.content.Context;
import android.content.DialogInterface;
import android.content.Intent;
import android.support.annotation.NonNull;
import android.support.v7.app.AlertDialog;
import android.support.v7.widget.CardView;
import android.support.v7.widget.RecyclerView;
import android.view.LayoutInflater;
import android.view.MenuItem;
import android.view.View;
import android.view.ViewGroup;
import android.widget.ImageView;
import android.widget.PopupMenu;
import android.widget.TextView;
import android.widget.Toast;

import com.example.poliklinik.Api.Client;
import com.example.poliklinik.Api.InterfaceVerifikasi;
import com.example.poliklinik.Model.PasienListItem;
import com.example.poliklinik.Model.VerifikasiResponse;
import com.example.poliklinik.R;
import com.example.poliklinik.Sessionlogin;
import com.example.poliklinik.User.Halamanutama_User;
import com.example.poliklinik.User.Input_Pasien;

import java.util.HashMap;
import java.util.List;

import retrofit2.Call;
import retrofit2.Callback;
import retrofit2.Response;

public class Pasienmodel extends RecyclerView.Adapter<Pasienmodel.DataViewAdapter> {
   private Context context;
   private List<PasienListItem> listPasien;
   private InterfaceVerifikasi mInterfaceVerifikasi;
   private Sessionlogin sessionlogin;

    public Pasienmodel(Context context, List<PasienListItem> listPasien){
        this.context = context;
        this.listPasien = listPasien;
    }


    @NonNull
    @Override
    public Pasienmodel.DataViewAdapter onCreateViewHolder(@NonNull ViewGroup viewGroup, int i) {
        LayoutInflater layoutInflater = LayoutInflater.from(viewGroup.getContext());
        View view = layoutInflater.inflate(R.layout.pasienmodel,viewGroup,false);
        sessionlogin = new Sessionlogin(context);
        mInterfaceVerifikasi = (InterfaceVerifikasi) Client.getClient().create(InterfaceVerifikasi.class);
        return new DataViewAdapter(view);
    }

    @Override
    public void onBindViewHolder(@NonNull final Pasienmodel.DataViewAdapter dataViewAdapter, final int i) {
        final PasienListItem pasienListItem = listPasien.get(i);
        dataViewAdapter.tv_nokonfirmasi.setText(pasienListItem.getNo_konfirmasi());
        dataViewAdapter.tv_nama.setText(pasienListItem.getNama());
        dataViewAdapter.iv_foto.setImageResource(R.drawable.ic_account_circle_black_24dp);
        dataViewAdapter.tv_jeniskelamin.setText(pasienListItem.getJenis_kelamin());
        dataViewAdapter.tv_golongandarah.setText(pasienListItem.getGol_darah());
        dataViewAdapter.tv_alamat.setText(pasienListItem.getAlamat());
        dataViewAdapter.tv_riwayatpenyakit.setText(pasienListItem.getRiwayat_penyakit());
        dataViewAdapter.tv_nohp.setText(pasienListItem.getNo_hp());
        dataViewAdapter.tv_tanggalkunjungan.setText(pasienListItem.getTanggal_kunjungan());
        dataViewAdapter.tv_dokter.setText(pasienListItem.getNama_dokter());
        dataViewAdapter.cv_dokter.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                AlertDialog.Builder alertDialogBuilder = new AlertDialog.Builder(context);
                alertDialogBuilder.setTitle("Message");
                alertDialogBuilder.setMessage("Anda Yakin Ingin Konfirmasi "+pasienListItem.getNo_konfirmasi()+" ?")
                        .setCancelable(false)
                        .setNegativeButton("Batal", new DialogInterface.OnClickListener() {
                            @Override
                            public void onClick(DialogInterface dialog, int which) {

                            }
                        })
                        .setPositiveButton("Ya", new DialogInterface.OnClickListener() {
                            @Override
                            public void onClick(DialogInterface dialog, int which) {
                                mInterfaceVerifikasi.verifikasiPasien(pasienListItem.getNo_konfirmasi(),pasienListItem.getUser_create(),pasienListItem.getId_dokter()).enqueue(new Callback<VerifikasiResponse>() {
                                    @Override
                                    public void onResponse(Call<VerifikasiResponse> call, Response<VerifikasiResponse> response) {
                                        VerifikasiResponse verifikasiResponse = (VerifikasiResponse) response.body();
                                        if(!verifikasiResponse.isError()){
                                            Toast.makeText(context, verifikasiResponse.getMessage(), Toast.LENGTH_SHORT).show();
                                        }
                                        Toast.makeText(context, verifikasiResponse.getMessage(), Toast.LENGTH_SHORT).show();
                                    }

                                    @Override
                                    public void onFailure(Call<VerifikasiResponse> call, Throwable t) {

                                    }
                                });
                            }
                        });
                AlertDialog alertDialog = alertDialogBuilder.create();
                alertDialog.show();

            }
        });
    }

    @Override
    public int getItemCount() {
        return listPasien.size();
    }

    public class DataViewAdapter extends RecyclerView.ViewHolder{
        private ImageView iv_foto;
        private CardView cv_dokter;
        private TextView tv_nokonfirmasi,tv_nama,tv_jeniskelamin,tv_golongandarah,tv_alamat,tv_riwayatpenyakit,tv_nohp,tv_tanggalkunjungan,tv_dokter;

       public DataViewAdapter(@NonNull View itemView){
            super(itemView);

            cv_dokter = (CardView) itemView.findViewById(R.id.cv_dokter);
            iv_foto = (ImageView) itemView.findViewById(R.id.iv_foto);
            tv_nokonfirmasi = (TextView) itemView.findViewById(R.id.tv_nokonfirmasi);
            tv_nama = (TextView) itemView.findViewById(R.id.tv_namapasien);
            tv_jeniskelamin = (TextView) itemView.findViewById(R.id.tv_jeniskelamin);
            tv_golongandarah = (TextView) itemView.findViewById(R.id.tv_golongandarah);
            tv_alamat = (TextView) itemView.findViewById(R.id.tv_alamat);
            tv_riwayatpenyakit = (TextView) itemView.findViewById(R.id.tv_riwayatpenyakit);
            tv_nohp = (TextView) itemView.findViewById(R.id.tv_nohp);
            tv_tanggalkunjungan = (TextView) itemView.findViewById(R.id.tv_tanggalkunjung);
            tv_dokter = (TextView) itemView.findViewById(R.id.tv_dokter);
        }
    }
}
