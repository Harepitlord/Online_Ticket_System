package System;

import java.util.HashMap;

public class TrainDatabase {
    private static HashMap<String,Train> Trains;

    public TrainDatabase(String filename) {
        if(Trains==null){
            Trains = new HashMap<>();
            Trains=loadTrains(filename);
        }
    }

    private HashMap<String,Train> loadTrains(String filename) {
        HashMap<String, Train> temp= new HashMap<>();

        // code for loading the data into the hashmap
        return temp;
    }
}
