package System;

public class Train {
    private final String id;
    private final String name;
    private final String begStation;
    private final String destination;
    private final boolean pantry;
    private final int compartments;

    public Train (String anid,String aname,String beg,String dest,int comp,boolean pant) {
        id=anid.trim();
        name=aname.trim();
        begStation=beg.trim();
        destination=dest.trim();
        pantry=pant;
        compartments=comp;
    }

    public String getDestination() {
        return destination;
    }

    public int getCompartments() {
        return compartments;
    }

    public String getId() {
        return id;
    }

    public boolean isPantry() {
        return pantry;
    }

    public String getBegStation() {
        return begStation;
    }

    public String getName() {
        return name;
    }

    public String toString() {
        return "Train id: "+id+" , Train name: "+name;
    }
}
