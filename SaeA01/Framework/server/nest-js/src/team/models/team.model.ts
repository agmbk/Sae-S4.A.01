import {Column, Entity, PrimaryColumn} from "typeorm";

@Entity()
export class Team {
    @PrimaryColumn({length: 64})
    libelle: string
    @Column({length: 128})
    entraineur: string
    @Column({length: 128})
    creneaux: string
    @Column({length: 512})
    url_photo: string
    @Column({length: 512})
    url_result_calendrier: string
    @Column()
    commentaire: string
}
