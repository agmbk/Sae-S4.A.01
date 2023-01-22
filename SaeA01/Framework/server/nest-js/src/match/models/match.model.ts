import {Column, Entity, OneToOne, PrimaryGeneratedColumn} from "typeorm";
import {TeamModel} from "../../team/models/team.model";

@Entity()
export class MatchModel {

    @PrimaryGeneratedColumn('increment')
    id_match: number

    @OneToOne(type => TeamModel, object => object.libelle)
    equipe_locale: string

    @Column("tinyint")
    domicile_exterieur: string

    @OneToOne(type => TeamModel, object => object.libelle)
    equipe_adverse: string

    @Column({length: 64})
    hote: string

    @Column('datetime')
    date_heure: Date

    @Column("int")
    num_semaine: number


    @Column("int")
    num_journee: number

    @Column({length: 64})
    gymnase: string
}
