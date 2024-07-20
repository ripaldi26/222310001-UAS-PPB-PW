import React, { useState, useEffect } from 'react';
import {
    KeyboardAvoidingView,
    Platform,
    StatusBar,
    StyleSheet,
    Text,
    TextInput,
    TouchableOpacity,
    View,
    Alert,
    ScrollView,
} from 'react-native';
import { Picker } from '@react-native-picker/picker';
import Header from '../template/Header';

const Home = ({ navigation }) => {
    const [selectedJangka, setSelectedJangka] = useState(null);
    const [selectedBank, setSelectedBank] = useState(null);
    const [loanAmount, setLoanAmount] = useState('');
    const [bungaKeseluruhan, setBunga] = useState('');
    const [itemsJangka, setItemsJangka] = useState([]);
    const [itemsBank, setItemsBank] = useState([
        { label: 'BCA', value: 'BCA' },
        { label: 'BNI', value: 'BNI' },
        { label: 'BSI', value: 'BSI' }
    ]);

    const formatNumber = (num) => {
        if (!num) return '';
        return `${num.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".")}`;
    };

    const handleCalculate = () => {
        if (!loanAmount || !selectedJangka || !bungaKeseluruhan) {
            Alert.alert(
                'Input Required',
                'Mohon lengkapi semua input sebelum menghitung.',
                [{ text: 'OK' }]
            );
        } else {
            navigation.navigate('Page2', {
                loanAmount,
                selectedBank,
                selectedJangka,
                bungaKeseluruhan,
            });
        }
    };

    useEffect(() => {
        const updateItemsJangka = () => {
            let updatedItemsJangka = [];
            const baseJangka = {
                BNI: [
                    { label: '3 bulan', value: '3' },
                    { label: '6 bulan', value: '6' },
                    { label: '1 tahun', value: '12' },
                    { label: '2 tahun', value: '24' },
                    { label: '3 tahun', value: '36' },
                    { label: '5 tahun', value: '60' },
                    { label: '6 tahun', value: '72' },
                    { label: '10 tahun', value: '120' },
                    { label: '15 tahun', value: '180' },
                    { label: '20 tahun', value: '240' }
                ],
                BSI: [
                    { label: '3 bulan', value: '3' },
                    { label: '5 bulan', value: '5' },
                    { label: '8 bulan', value: '8' },
                    { label: '1 tahun', value: '12' },
                    { label: '2 tahun', value: '24' },
                    { label: '5 tahun', value: '60' },
                    { label: '7 tahun', value: '84' },
                    { label: '12 tahun', value: '144' },
                    { label: '16 tahun', value: '192' },
                    { label: '20 tahun', value: '240' }
                ],
                BCA: [
                    { label: '3 bulan', value: '3' },
                    { label: '6 bulan', value: '6' },
                    { label: '8 bulan', value: '8' },
                    { label: '1 tahun', value: '12' },
                    { label: '1.5 tahun', value: '18' },
                    { label: '2 tahun', value: '24' },
                    { label: '2.5 tahun', value: '30' },
                    { label: '4 tahun', value: '48' },
                    { label: '6 tahun', value: '72' },
                    { label: '7 tahun', value: '84' },
                    { label: '13 tahun', value: '156' },
                    { label: '15 tahun', value: '180' },
                    { label: '20 tahun', value: '240' }
                ]
            };

            // if (selectedBank && loanAmount) {
            //     const numericLoanAmount = parseInt(loanAmount.replace(/[^\d]/g, ''), 10);

            //     if (numericLoanAmount < 10000000) {
            //         updatedItemsJangka = baseJangka[selectedBank].filter(item => parseInt(item.value) <= 12);
            //     } else if (numericLoanAmount < 100000000) {
            //         updatedItemsJangka = baseJangka[selectedBank].filter(item => parseInt(item.value) >= 12 && parseInt(item.value) <= 60);
            //     } else {
            //         updatedItemsJangka = baseJangka[selectedBank].filter(item => parseInt(item.value) >= 60);
            //     }
            // } else {
            updatedItemsJangka = baseJangka[selectedBank] || [];


            setItemsJangka(updatedItemsJangka);
        };

        updateItemsJangka();
    }, [selectedBank, loanAmount]);

    useEffect(() => {
        if (selectedBank) {
            switch (selectedBank) {
                case 'BNI':
                    setBunga('5');
                    break;
                case 'BCA':
                    setBunga('6');
                    break;
                case 'BSI':
                    setBunga('7');
                    break;
                default:
                    setBunga('');
            }
        }
    }, [selectedBank]);

    return (
        <KeyboardAvoidingView behavior={Platform.OS === "android" ? 'padding' : 'height'} style={styles.container}>
            <StatusBar hidden={false} />
            <ScrollView>
                <View>
                    <Header />
                    <View style={styles.containerBody}>
                        <View style={styles.containerTextSimulasi}>
                            <Text style={styles.textSimulasi}>
                                Mohon masukkan angka ke dalam tabel dibawah ini dan kemudian klik tombol hitung untuk mendapatkan
                                informasi detail kredit anda mulai dari informasi pinjaman dan informasi angsuran
                            </Text>
                        </View>
                        <View style={styles.inputContainer}>
                            <Text>Pokok Pinjaman</Text>
                            <TextInput
                                style={styles.textInput}
                                placeholder="Masukkan jumlah pinjaman"
                                keyboardType="numeric"
                                value={loanAmount !== '' ? formatNumber(loanAmount) : ''}
                                onChangeText={(text) => {
                                    const numericValue = text.replace(/[^\d]/g, '');
                                    setLoanAmount(numericValue);
                                }}
                            />
                        </View>
                        <View style={styles.inputContainer}>
                            <Text>Pilih Bank</Text>
                            <View style={[styles.picker, { padding: 1, }]}>
                                <Picker
                                    selectedValue={selectedBank}
                                    style={styles.picker}
                                    onValueChange={(itemValue) => setSelectedBank(itemValue)}
                                >
                                    <Picker.Item label="--Pilih--" value={null} style={{ fontSize: 14 }} />
                                    {itemsBank.map((item, index) => (
                                        <Picker.Item key={index} label={item.label} value={item.value} style={{ fontSize: 14 }} />
                                    ))}
                                </Picker>
                            </View>
                        </View>
                        <View style={styles.inputContainer}>
                            <Text>Jumlah bunga (%)</Text>
                            <Text style={styles.bungaText}>
                                {bungaKeseluruhan}
                            </Text>
                        </View>
                        <View style={styles.jangkaWaktu}>
                            <Text>Jangka Waktu</Text>
                            <View style={[styles.picker, { padding: 1, }]}>
                                <Picker
                                    selectedValue={selectedJangka}
                                    style={styles.picker}
                                    onValueChange={(itemValue, itemIndex) => setSelectedJangka(itemValue)}
                                >
                                    <Picker.Item label="--Pilih--" value={null} style={{ fontSize: 14 }} />
                                    {itemsJangka.map((item, index) => (
                                        <Picker.Item key={index} label={item.label} value={item.value} style={{ fontSize: 14 }} />
                                    ))}
                                </Picker>
                            </View>
                        </View>
                    </View>
                    <View style={styles.containerButton}>
                        <TouchableOpacity style={styles.button} onPress={handleCalculate}>
                            <Text style={styles.buttonText}>Hitung</Text>
                        </TouchableOpacity>
                    </View>
                </View>
            </ScrollView >
        </KeyboardAvoidingView >
    );
};

const styles = StyleSheet.create({
    container: {
        flex: 1,
    },
    containerBody: {
        borderWidth: 1,
        marginHorizontal: 10,
        marginVertical: 30,
        paddingHorizontal: 10,
        paddingVertical: 20,
        borderRadius: 10,
        height: 567,
    },
    containerTextSimulasi: {
        padding: 10
    },
    textSimulasi: {
        fontSize: 14,
        lineHeight: 20,
        marginBottom: '1%',
    },
    picker: {
        backgroundColor: '#f0f0f0',
        borderStyle: 'solid',
        borderColor: 'gray',
        borderWidth: 1,
        borderRadius: 5,
        paddingHorizontal: 1,
    },
    inputContainer: {
        marginVertical: 5,
        padding: 10,
    },
    textInput: {
        height: 50,
        borderColor: 'gray',
        borderWidth: 1,
        borderRadius: 5,
        paddingHorizontal: 17,
        backgroundColor: '#f0f0f0',
        width: '100%',
    },
    bungaText: {
        height: 50,
        borderColor: 'gray',
        borderWidth: 1,
        borderRadius: 5,
        paddingHorizontal: 17,
        backgroundColor: '#f0f0f0',
        width: '100%',
        justifyContent: 'center',
        lineHeight: 50,
        paddingLeft: 15,
    },
    jangkaWaktu: {
        padding: 10
    },
    containerButton: {
        justifyContent: 'center',
        alignItems: 'center',
    },
    button: {
        backgroundColor: 'blue',
        width: 85,
        height: 30,
        alignItems: 'center',
        justifyContent: 'center',
        borderRadius: 5,
        position: 'relative',
    },
    buttonText: {
        color: 'white',
    },
});

export default Home;
