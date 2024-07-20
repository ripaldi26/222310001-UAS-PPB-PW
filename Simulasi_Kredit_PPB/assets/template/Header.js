import React from 'react';
import { StyleSheet, Text, View } from 'react-native';

const Header = () => {
    return (
        <View style={styles.headerContainer}>
            <Text style={styles.headerText}>Kalkulator Kredit</Text>
        </View>
    );
}

const styles = StyleSheet.create({
    headerContainer: {
        backgroundColor: 'purple',
        width: '100%',
        height: 82,
        justifyContent: 'center',
    },
    headerText: {
        fontSize: 25,
        color: 'white',
        marginLeft: 20,
        fontWeight: 'bold'
    },
});

export default Header;
