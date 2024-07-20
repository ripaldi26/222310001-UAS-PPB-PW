import Header from '../template/Header';
import React from 'react';
import { StyleSheet, Text, TouchableOpacity, View } from 'react-native';

const Output = ({ route, navigation }) => {
    const { loanAmount, selectedBank, selectedJangka, bungaKeseluruhan } = route.params;

    const loanAmountInt = parseInt(loanAmount.replace(/\./g, ''));
    const periode = parseInt(selectedJangka.split(' ')[0]);
    const bunga = parseFloat(bungaKeseluruhan);

    const totalBunga = loanAmountInt * bunga / 100;
    const totalDibayar = loanAmountInt + totalBunga;
    const angsuran = totalDibayar / periode;

    const formatNumber = (num) => {
        return num.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
    };

    const handleBackPress = () => {
        navigation.reset({
            index: 0,
            routes: [{ name: 'Page1' }],
        });
    };

    return (
        <View style={styles.container}>
            <Header />
            <View style={styles.containerInformasiPinjaman}>
                <View style={styles.headerInformasiPinjaman}>
                    <Text style={styles.headerText}>Informasi Pinjaman</Text>
                </View>
                <View>
                    <Text style={styles.contentInformasiPinjaman}>Pokok Pinjaman : Rp {formatNumber(loanAmount)}</Text>
                    <Text style={styles.contentInformasiPinjaman}>Nama Bank : {selectedBank}</Text>
                    <Text style={styles.contentInformasiPinjaman}>Jangka Waktu Angsuran : {selectedJangka} bulan</Text>
                    <Text style={styles.contentInformasiPinjaman}>Bunga : {bungaKeseluruhan}%</Text>
                </View>
            </View>
            <View style={styles.containerInformasiPinjaman}>
                <View style={styles.headerInformasiPinjaman}>
                    <Text style={styles.headerText}>Informasi Angsuran</Text>
                </View>
                <View>
                    <Text style={styles.contentInformasiPinjaman}>Angsuran : Rp {formatNumber(Math.round(angsuran))}</Text>
                    <Text style={styles.contentInformasiPinjaman}>Total Periode : {periode} bulan</Text>
                    <Text style={styles.contentInformasiPinjaman}>Total Bunga : Rp {formatNumber(Math.round(totalBunga))}</Text>
                    <Text style={styles.contentInformasiPinjaman}>Total Yang Dibayarkan : Rp {formatNumber(Math.round(totalDibayar))}</Text>
                </View>
            </View>
            <View style={styles.containerButton}>
                <TouchableOpacity style={styles.button} onPress={handleBackPress}>
                    <Text style={styles.buttonText}>Kembali</Text>
                </TouchableOpacity>
            </View>
        </View>
    );
}

const styles = StyleSheet.create({
    containerInformasiPinjaman: {
        borderWidth: 1,
        height: 190,
        marginHorizontal: 20,
        marginTop: 50,
        borderRadius: 7
    },
    headerInformasiPinjaman: {
        backgroundColor: 'purple',
        justifyContent: 'center',
        alignItems: 'center',
        padding: 5
    },
    contentInformasiPinjaman: {
        lineHeight: 37,
        fontSize: 14,
        paddingHorizontal: 10
    },
    headerText: {
        color: 'white',
        fontWeight: 'bold',
        fontSize: 20,
    },
    containerButton: {
        justifyContent: 'center',
        alignItems: 'center',
    },
    button: {
        marginTop: 85,
        backgroundColor: 'blue',
        width: 85,
        height: 30,
        alignItems: 'center',
        justifyContent: 'center',
        borderRadius: 5,
    },
    buttonText: {
        color: 'white',
    },
    containerFooter: {
        backgroundColor: 'purple',
        width: '100%',
        height: 60,
        marginTop: '9%',
        flexDirection: 'row',
        justifyContent: 'space-around',
        alignItems: 'center',
    },
    footer: {
        paddingHorizontal: 5,
    },
});

export default Output;